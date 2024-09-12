<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Appointment;
use App\Models\CompanyAbout;
use App\Models\CompanyStatistic;
use App\Models\HeroSection;
use App\Models\OurPrinciple;
use App\Models\OurTeam;
use App\Models\Product;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

<<<<<<< HEAD
    public function product()
=======
    public function appointment()
>>>>>>> parent of b3d7029 (add product page & add send message with telegram)
    {
        $testimonials = Testimonial::take(4)->get();
        $products = Product::take(3)->get();

<<<<<<< HEAD
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

        $BOT_TOKEN = env('BOT_TOKEN');
        $USER_ID = env('CHAT_ID');
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
=======
        return view('front.appointment', compact('testimonials', 'products'));
    }

    public function appointment_store(StoreAppointmentRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();
            $newAppointment = Appointment::create($validated);
        });

        return redirect()->route('front.index');
>>>>>>> parent of b3d7029 (add product page & add send message with telegram)
    }
}
