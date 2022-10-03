@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">Buy sawn timber faster and smarter</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">Order materials quickly, free up cash and increase margins. Timberhub saves you time and money by managing procurement, finance and transportation.</p>
                <a href="{{route('products.index')}}" class="focus:outline-none text-white bg-green-700 px-5 py-3 mr-3 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 ">
                    Browse our products
                </a>
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="https://www.timberhub.com/_next/image?url=%2Fimages%2Fhomepage-hero.png&w=640&q=75" alt="mockup">
            </div>
        </div>
    </section>
@endsection
