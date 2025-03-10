@extends('layout.app')

@section('title', 'Ultimate Fitness Guide')

@section('content')
    <!-- Hero Section -->
    <section class="hero text-white text-center py-5 position-relative "
        style="background: url('{{ asset('images/bg-hero.png') }}') no-repeat center center/cover;">
        <div class="overlay"></div>
        <div class="container position-relative content">
            <h1 class="fw-bold">Transform Your Body with Our Ultimate Fitness Guide</h1>
            <p class="lead">A complete step-by-step plan to achieve your health and fitness goals.</p>
            <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Get Started Now</a>
        </div>
    </section>
    <!-- Partners Section -->
    <section class="partners py-5 bg-light my-5">
        <div class="container text-center">
            <h2 class="fw-bold mb-4">Our Fitness Partners</h2>
            <div class="row justify-content-center">
                <div class="col-md-2 col-4">
                    <img src="{{ asset('images/partners/nike-icon.png') }}" class="img-fluid" alt="nike-icon">
                </div>
                <div class="col-md-2 col-4">
                    <img src="{{ asset('images/partners/UnderArmor.png') }}" class="img-fluid" alt="UnderArmor">
                </div>
                <div class="col-md-2 col-4">
                    <img src="{{ asset('images/partners/Myprotein.png') }}" class="img-fluid" alt="Myprotein">
                </div>
                <div class="col-md-2 col-4">
                    <img src="{{ asset('images/partners/puma.png') }}" class="img-fluid" alt="puma">
                </div>
                <div class="col-md-2 col-4">
                    <img src="{{ asset('images/partners/gymshark.png') }}" class="img-fluid" alt="gymshark">
                </div>
            </div>
        </div>
    </section>
    
    <!-- About Section -->
    <section class="about py-5">
        <div class="container text-center">
            <h2 class="fw-bold">What’s Inside?</h2>
            <p class="text-muted">Our guide includes personalized workouts, diet plans, and expert tips to help you stay
                fit.</p>
            <img src="{{ asset('images/fitness-guide.jpg') }}" class="img-fluid rounded shadow-sm mt-3 " alt="Fitness Guide">
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="benefits bg-light py-5">
        <div class="container text-center">
            <h2 class="fw-bold">Why Choose Our Fitness Guide?</h2>
            <div class="row mt-4">
                <div class="col-md-4">
                    <h4>🏋️‍♂️ Effective Workouts</h4>
                    <p>Scientifically designed workouts for all fitness levels.</p>
                </div>
                <div class="col-md-4">
                    <h4>🥗 Nutrition Plans</h4>
                    <p>Custom meal plans tailored to your fitness goals.</p>
                </div>
                <div class="col-md-4">
                    <h4>📊 Progress Tracking</h4>
                    <p>Monitor your improvements and stay motivated.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials py-5">
        <div class="container text-center">
            <h2 class="fw-bold">Success Stories</h2>
            <div class="row mt-4">
                <div class="col-md-6">
                    <blockquote class="blockquote">
                        <p>"This guide changed my life! I lost 20 lbs in 3 months!"</p>
                        <footer class="blockquote-footer">Sarah M.</footer>
                    </blockquote>
                </div>
                <div class="col-md-6">
                    <blockquote class="blockquote">
                        <p>"I've gained muscle and feel more confident than ever!"</p>
                        <footer class="blockquote-footer">John D.</footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </section>

    <!-- Call-to-Action Section -->
    <section class="cta bg-dark text-white text-center py-5">
        <div class="container">
            <h2 class="fw-bold">Start Your Fitness Journey Today!</h2>
            <p>Join thousands of others achieving their fitness goals.</p>
            <a href="{{ route('register') }}" class="btn btn-warning btn-lg">Download the Guide</a>
        </div>
    </section>
@endsection