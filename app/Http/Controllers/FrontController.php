<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\OurCertification;
use App\Models\HeroSection;
use App\Models\Location;
use App\Models\OurPrinciple;
use App\Models\OurTeam;
use App\Models\SuperTeam;
use App\Models\Product;
use App\Models\ProductIdentity;
use App\Models\Testimonial;
use App\Models\VoucherPackage;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Artesaos\SEOTools\SEOTools;

class FrontController extends Controller
{
    //
    public function index(SEOTools $seoTools)
    {
        // Settings metadata SEO
        $seoTools->setTitle('Beranda | Wilzio Internet Provider | 085179709387');
        $seoTools->setDescription('Selamat datang di Wilzio Internet Provider. Kami menyediakan layanan internet berkualitas untuk kebutuhan rumah dan bisnis Anda.');
        $seoTools->opengraph()->setUrl(route('front.index'));
        $seoTools->opengraph()->addProperty('location:region', 'Kalimantan Utara');
        $seoTools->opengraph()->addProperty('location:locality', 'Pura Sajau');
        $seoTools->opengraph()->addProperty('location:district', 'Tanjung Palas Timur');
        $seoTools->opengraph()->addProperty('location:city', 'Kab. Bulungan');
        $seoTools->opengraph()->addProperty('contact:phone_number', '085179709387'); 
        $seoTools->setCanonical(route('front.index'));
    

        $principles = OurPrinciple::take(6)->get();
        $products = Product::take(3)->get();
        $testimonials = Testimonial::orderByDesc('id')->get();
        $hero_section = HeroSection::orderByDesc('id')->get();
    
        return view('front.index', compact('principles','products', 'testimonials', 'hero_section'));
    }

    public function team(SEOTools $seoTools)
    {
        // Ambil data untuk ditampilkan di view
        $abouts = AboutUs::all();
        $teams = OurTeam::all();
        $certifications = OurCertification::all();
        $super_teams = SuperTeam::all();
        $product_identities = ProductIdentity::all();
        
        // Buat deskripsi dinamis berdasarkan data sertifikasi
        $certificationNames = $certifications->pluck('name')->join(', ');
        $description = "Kenali tim kami yang profesional dan berdedikasi di Wilzio Internet Provider. Kami sudah mendapatkan sertifikasi dari APJII dan sertifikasi lainnya: {$certificationNames}.";

        // Pengaturan metadata SEO
        $seoTools->setTitle('Tim Kami | Wilzio Internet Providerv| 085179709387');
        $seoTools->setDescription($description);
        $seoTools->opengraph()->setUrl(route('front.team'));
        $seoTools->opengraph()->addProperty('og:see_also', 'https://apjii.or.id/anggota/infoisp/kalimantan-utara');
        $seoTools->setCanonical(route('front.team'));

        return view('front.team', compact('abouts', 'teams', 'certifications', 'super_teams', 'product_identities'));
    }

    public function product(SEOTools $seoTools)
    {
        // Atur metadata SEO
        $seoTools->setTitle('Produk Kami | Wilzio Internet Provider | 085179709387');
        $seoTools->setDescription('Lihat berbagai produk layanan internet yang ditawarkan oleh Wilzio Internet Provider.');
        $seoTools->opengraph()->setUrl(route('front.product'));
        $seoTools->setCanonical(route('front.product'));
    
        // Ambil data produk
        $products = Product::take(3)->get();
    
        return view('front.product', compact('products'));
    }


    public function orderProduct(Request $request, SEOTools $seoTools)
    {
        // Settings metadata SEO
        $seoTools->setTitle('Pesan Produk | Wilzio Internet Provider | 085179709387');
        $seoTools->setDescription('Pesan produk layanan internet Wilzio Internet Provider dengan mudah dan cepat.');
        $seoTools->opengraph()->setUrl(route('front.orderProduct'));
        $seoTools->setCanonical(route('front.orderProduct'));
    
        // Input Validation
        $request->validate([
            'product_id' => 'required',
            'nama' => 'required',
            'no_wa' => 'required',
            'foto_ktp' => 'required',
        ]);
    
        // Save File
        $imagePath = $request->file('foto_ktp')->store('private/images');
        $imageFullPath = Storage::path($imagePath);
    
        // Get Data Product
        $product = Product::find($request->product_id);
        $nama = $request->nama;
        $no_wa = $request->no_wa;
        $product_name = $product->name;
        $msg = "*Permintaan Pemasangan Baru*\n\nNama : {$nama}\nNomor WA : {$no_wa}\nProduk : {$product_name}";
    
        // Get Data Bot From .env
        $BOT_TOKEN = env('BOT_TOKEN_2');
        $USER_ID = env('CHAT_ID_2');
    
        // Send Image and Data to Telegram
        $client = new Client();
        $response = $client->post("https://api.telegram.org/bot{$BOT_TOKEN}/sendPhoto", [
            'multipart' => [
                ['name' => 'chat_id', 'contents' => $USER_ID],
                ['name' => 'photo', 'contents' => fopen($imageFullPath, 'r')],
                ['name' => 'caption', 'contents' => $msg],
                ['name' => 'parse_mode', 'contents' => 'MarkdownV2']
            ]
        ]);
    
        return redirect()->back()->with('success_order', true);
    }

        public function showVoucherPage($locationId, $voucher_package_id)
    {
        $location = Location::findorFail($locationId); // Adjust with the appropriate query or ID
        $voucher = VoucherPackage::findOrFail($voucher_package_id); // Adjust with the appropriate query or ID

        return view('front.layouts.app', compact('location', 'voucher'));
    }


    

    public function location(Request $request) 
    {
        return view('front.location');
    }

    public function locationOrder(Location $location)
    {
        return view('front.location_order', compact('location'));
    }

    public function locationOrderContinue(Request $request, Location $location)
    {
        $selected_payment_method = $request->payment_method;
        $voucher_package = VoucherPackage::find($request->voucher_package_id);
        return view('front.location_order_continue', compact('location', 'voucher_package', 'selected_payment_method'));
    }

    public function confirmOrderVoucher(Request $request, Location $location, VoucherPackage $voucher) 
    {

        $BOT_TOKEN = env('BOT_TOKEN_2');
        dd($BOT_TOKEN);
        $CHAT_ID = env('CHAT_ID_2');
        dd($BOT_TOKEN, $CHAT_ID);

        // Save files
        $imagePath = $request->file('bukti_pembayaran')->store('private/images');
        $imageFullPath = Storage::path($imagePath);
        $whatsapp = $request->no_whatsapp;

        // Escape special characters for Telegram MarkdownV2
        $locationName = str_replace(['-', '_', '.', '*', '[', ']', '(', ')'], ['\-', '\_', '\.', '\*', '\[', '\]', '\(', '\)'], $location->name);
        $voucherName = str_replace(['-', '_', '.', '*', '[', ']', '(', ')'], ['\-', '\_', '\.', '\*', '\[', '\]', '\(', '\)'], $voucher->name);
        $paymentMethod = str_replace(['-', '_', '.', '*', '[', ']', '(', ')'], ['\-', '\_', '\.', '\*', '\[', '\]', '\(', '\)'], $request->payment_method);
        $whatsappEscaped = str_replace(['-', '_', '.', '*', '[', ']', '(', ')'], ['\-', '\_', '\.', '\*', '\[', '\]', '\(', '\)'], $whatsapp);

        // Generate public link for the image file (assuming you're storing it in a public storage or use a service like Cloudinary)
        $publicImageUrl = Storage::url($imagePath); // If using Laravel's public disk

        // Prepare the message to send to Telegram, including the clickable image link
        $msg = "
        *Pembelian Voucher Wi\\-Fi*\n\n
        Lokasi : " . $locationName . "\n
        Voucher : " . $voucherName . "\n
        Harga : " . $voucher->price . "\n
        Metode Bayar : " . $paymentMethod . "\n
        Nomor WhatsApp : " . $whatsappEscaped . "\n\n
        [Klik untuk melihat bukti pembayaran](" . $publicImageUrl . ")";

        // Send the payment proof to Telegram
        $client = new Client();
        $response = $client->post("https://api.telegram.org/bot{$BOT_TOKEN}/sendPhoto", [
            'multipart' => [
                [
                    'name' => 'chat_id',
                    'contents' => $CHAT_ID
                ],
                [
                    'name' => 'photo',
                    'contents' => fopen($imageFullPath, 'r')
                ],
                [
                    'name' => 'caption',
                    'contents' => $msg
                ],
                [
                    'name' => 'parse_mode',
                    'contents' => 'MarkdownV2'
                ]
            ]
        ]);
        dd($response->getBody()->getContents());

        return redirect()->route('front.location')->with('success', 'Pembelian voucher berhasil. Silahkan tunggu konfirmasi Admin');
    }
}
