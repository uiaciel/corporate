<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\Setting::create([
            "sitename" => "Hineni Resources",
            "tagline" => "",
            "description" => "HINENI RESOURCES PTE. LTD was established in 2021. Our main office is located in Orchard Tower, Singapore. We also operate in Jakarta, Indonesia. The Business's principal activity is WHOLESALE TRADE OF A VARIETY OF GOODS WITHOUT A DOMINANT PRODUCT. (eg COAL TRADING).",
            "url" => "hineniresources.com",
        ]);

        \App\Models\landingpage::create([
            "key" => "Menu Primary",
            "value_id" => '<div class="navbar-nav ms-auto ">
            <a href="/" class="nav-item nav-link active">Beranda</a>
            <a href="/about-us" class="nav-item nav-link text-white">Tentang Kami</a>
            <a href="/category/news" class="nav-item nav-link text-white">Berita Media</a>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown">Hubungan Investor</a>
                <div class="dropdown-menu bg-light rounded-0 m-0">
                    <a href="feature.html" class="dropdown-item">Features</a>
                    <a href="blog.html" class="dropdown-item">Blog Article</a>
                    <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                    <a href="404.html" class="dropdown-item">404 Page</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown">ESG</a>
                <div class="dropdown-menu bg-light rounded-0 m-0">
                    <a href="feature.html" class="dropdown-item">Features</a>
                    <a href="blog.html" class="dropdown-item">Blog Article</a>
                    <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                    <a href="404.html" class="dropdown-item">404 Page</a>
                </div>
            </div>
            <a href="contact.html" class="nav-item nav-link text-white">Hubungi Kami</a>
        </div>',
        "value_en" => '<div class="navbar-nav ms-auto ">
        <a href="/" class="nav-item nav-link active">Home</a>
        <a href="/about-us" class="nav-item nav-link text-white">About Us</a>
        <a href="/category/news" class="nav-item nav-link text-white">News & Media</a>

        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown">Investor Relation</a>
            <div class="dropdown-menu bg-light rounded-0 m-0">
                <a href="feature.html" class="dropdown-item">Features</a>
                <a href="blog.html" class="dropdown-item">Blog Article</a>
                <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                <a href="404.html" class="dropdown-item">404 Page</a>
            </div>
        </div>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown">ESG</a>
            <div class="dropdown-menu bg-light rounded-0 m-0">
                <a href="feature.html" class="dropdown-item">Features</a>
                <a href="blog.html" class="dropdown-item">Blog Article</a>
                <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                <a href="404.html" class="dropdown-item">404 Page</a>
            </div>
        </div>
        <a href="contact.html" class="nav-item nav-link text-white">Contact Us</a>
    </div>',
            "slug" => "menu-primary",
        ]);

        \App\Models\landingpage::create([
            "key" => "Menu Secondary",
            "value_id" => '<a class="btn btn-link" href="">Tentang Kami</a>
            <a class="btn btn-link" href="">Berita & Media</a>
            <a class="btn btn-link" href="">Hubungan Investor</a>
            <a class="btn btn-link" href="">ESG</a>
            <a class="btn btn-link" href="">Kontak Kami</a>',
            "value_en" => '<a class="btn btn-link" href="">About Us</a>
            <a class="btn btn-link" href="">News & Media</a>
            <a class="btn btn-link" href="">Investor Relation</a>
            <a class="btn btn-link" href="">ESG</a>
            <a class="btn btn-link" href="">Contact Us</a>',
            "slug" => "menu-secondary",
        ]);



    }
}
