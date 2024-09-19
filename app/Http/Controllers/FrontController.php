<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Appointment;
use App\Models\CompanyAbout;
use App\Models\CompanyStatistic;
use App\Models\HeroSection;
use App\Models\Location;
use App\Models\OurPrinciple;
use App\Models\OurTeam;
use App\Models\Product;
use App\Models\Testimonial;
use App\Models\VoucherPackage;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FrontController extends Controller
{
    //
    public function index()
    {
        $statistics = CompanyStatistic::take(4)->get();
        $principles = OurPrinciple::take(4)->get();
        $products = Product::take(3)->get();
        $teams = OurTeam::take(3)->get();
        $testimonials = Testimonial::take(4)->get();
        $hero_section = HeroSection::orderByDesc('id')->take(1)->get();

        return view('front.index', compact('statistics', 'principles', 'products', 'teams', 'testimonials', 'hero_section'));
    }

    public function team()
    {
        $statistics = CompanyStatistic::take(4)->get();
        $teams = OurTeam::take(7)->get();

        return view('front.team', compact('statistics', 'teams'));
    }

    public function about()
    {
        // $statistics = CompanyStatistic::take(4)->get();
        // $abouts = CompanyAbout::take(2)->get();
        $testimonials = Testimonial::take(4)->get();
        $products = Product::take(3)->get();

        return view('front.about', compact('products', 'testimonials'));
    }

    public function product()
    {
        $testimonials = Testimonial::take(4)->get();
        $products = Product::take(3)->get();

        return view('front.product', compact('products', 'testimonials'));
    }

    public function appointment()
    {
        $testimonials = Testimonial::take(4)->get();
        $products = Product::take(3)->get();

        return view('front.appointment', compact('testimonials', 'products'));
    }

    public function appointment_store(StoreAppointmentRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();
            $newAppointment = Appointment::create($validated);
        });

        return redirect()->route('front.index');
    }

    public function orderProduct(Request $request) {
        $request->validate([
            'product_id' => 'required',
            'nama' => 'required',
            'no_wa' => 'required',
            'foto_ktp' => 'required',
        ]);

        // save file
        $imagePath = $request->file('foto_ktp')->store('private/images');
        $imageFullPath = Storage::path($imagePath);

        $product = Product::find($request->product_id);

        $nama = $request->nama;
        $no_wa = $request->no_wa;
        $product_name = $product->name;
        $msg = "
        *Permintaan Pemasangan Baru*\n\nNama : ".$nama."\nNomor WA : ".$no_wa."\nProduk : ".$product_name;

        $BOT_TOKEN = env('BOT_TOKEN_2');
        $USER_ID = env('CHAT_ID_2');
        $client = new Client();
        $response = $client->post("https://api.telegram.org/bot{$BOT_TOKEN}/sendPhoto", [
            'multipart' => [
                [
                    'name' => 'chat_id',
                    'contents' => $USER_ID
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

        return redirect()->back()->with('success_order', true);
    }

    public function location(Request $request) 
    {
        if ($request->filled('search')) {
            $locations = Location::where('name', 'LIKE', '%'.$request->search.'%')->get();
        } else {
            $locations = Location::all();
        }

        return view('front.location', compact('locations'));
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
        // dd($request->all(), $location, $voucher);
        $BOT_TOKEN = env('BOT_TOKEN_2');
        $CHAT_ID = env('CHAT_ID_2');
        // dd($BOT_TOKEN, $CHAT_ID);

        // save files
        $imagePath = $request->file('bukti_pembayaran')->store('private/images');
        $imageFullPath = Storage::path($imagePath);
        $whatsapp = $request->no_whatsapp;

        $msg = "
        *Pembelian Voucher Wi\\-Fi*\n\nLokasi : ".$location->name . "\nVoucher : " . $voucher->name . "\nHarga : " . $voucher->price . "\nMetode Bayar : " . $request->payment_method."\nNomor WhatsApp : ".$whatsapp;
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

        return redirect()->route('front.location')->with('success', 'Pembelian voucher berhasil. Silahkan tunggu konfirmasi Admin');
    }

    // public function confirmOrderVoucher(Request $request, Location $location, VoucherPackage $voucher) 
    // {
    //     // Define the necessary variables
    //     $BOT_TOKEN = env('BOT_TOKEN_2');
    //     $CHAT_ID = env('CHAT_ID_2');
    //     $TWILIO_SID = env('TWILIO_SID');
    //     $TWILIO_AUTH_TOKEN = env('TWILIO_AUTH_TOKEN');
    //     $TWILIO_WHATSAPP_FROM = env('TWILIO_WHATSAPP_FROM');
    //     $whatsapp = $request->no_whatsapp;

    //     // Save the uploaded image file
    //     $imagePath = $request->file('bukti_pembayaran')->store('private/images');
    //     $imageFullPath = Storage::path($imagePath);

    //     // Prepare the message for both Telegram and WhatsApp
    //     $msg = "
    //     *Pembelian Voucher Wi\\-Fi*\n\nLokasi : " . $location->name . "\nVoucher : " . $voucher->name . "\nHarga : " . $voucher->price . "\nMetode Bayar : " . $request->payment_method . "\nNomor WhatsApp : " . $whatsapp;

    //     // Send message to Telegram
    //     $client = new Client();
    //     $client->post("https://api.telegram.org/bot{$BOT_TOKEN}/sendPhoto", [
    //         'multipart' => [
    //             [
    //                 'name' => 'chat_id',
    //                 'contents' => $CHAT_ID
    //             ],
    //             [
    //                 'name' => 'photo',
    //                 'contents' => fopen($imageFullPath, 'r')
    //             ],
    //             [
    //                 'name' => 'caption',
    //                 'contents' => $msg
    //             ],
    //             [
    //                 'name' => 'parse_mode',
    //                 'contents' => 'MarkdownV2'
    //             ]
    //         ]
    //     ]);

    //     // Send message to WhatsApp via Twilio
    //     $twilio = new TwilioClient($TWILIO_SID, $TWILIO_AUTH_TOKEN);
    //     $twilioMessage = "*Pembelian Voucher Wi-Fi*\n\nLokasi : " . $location->name . "\nVoucher : " . $voucher->name . "\nHarga : " . $voucher->price . "\nMetode Bayar : " . $request->payment_method . "\nNomor WhatsApp : " . $whatsapp;

    //     $twilio->messages->create(
    //         "whatsapp:" . $whatsapp, // Recipient's WhatsApp number
    //         [
    //             "from" => $TWILIO_WHATSAPP_FROM, // Your Twilio WhatsApp number
    //             "body" => $twilioMessage
    //         ]
    //     );

    //     // Redirect after successful message sending
    //     return redirect()->route('front.location')->with('success', 'Pembelian voucher berhasil. Silahkan tunggu konfirmasi Admin');
    // }

    
}
