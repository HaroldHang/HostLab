@extends('layouts.connect')

@section('content')
            <div class="flex-1 h-full max-w-6xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
                <div class="w-full text-center py-5">
                    <h1 class="text-2xl font-semibold">
                        Bienvenue sur HostLab
                    </h1>
                </div>
                <div class="flex flex-col overflow-y-auto md:flex-row">
                    <div class="illustrator p-3 h-32 md:h-auto md:w-1/2">
                        <img
                            aria-hidden="true"
                            class="object-cover w-full h-full dark:hidden"
                            src="{{asset('Images/Laboratory Analyst_Monochromatic.png')}}"
                            alt="Laboratory"
                        />
                    </div>
                    <div class="aform flex items-center justify-end p-6 sm:p-12 md:w-1/2">
                        <form class="flex flex-col items-center justify-end w-full h-full" method="POST" action="{{ route('login') }}">
                            @csrf
                            {{-- @error('pseudo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror --}}


                            <div class="w-3/4 h-full">
                                <h1
                                    class="mb-4 text-xl text-center font-semibold text-gray-700 dark:text-gray-200"
                                >
                                    Veuillez vous-connecter
                                </h1>
                                @if (session('error'))
                                    <div class="invalid-feedback mb-2 text-red-600" role="alert">
                                        <span>{{ session('error') }}</span>
                                    </div>
                                @endif
                                <label class="block text-sm">
                                  <span class="text-gray-700 dark:text-gray-400">Pseudo</span>
                                  <input
                                    class="block w-full mt-1 text-sm border-2 border-green-200 px-3 py-2 transition-border duration-50 dark:border-gray-600 dark:bg-gray-700 focus:border-green-600 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="Jane Doe" name="pseudo"
                                    required />
                                </label>
                                <label class="block mt-4 text-sm">
                                  <span class="text-gray-700 dark:text-gray-400">Mot de passe</span>
                                  <input
                                    class="block w-full mt-1 text-sm border-2 border-green-200 px-3 py-2 transition-border duration-50 dark:border-gray-600 dark:bg-gray-700 focus:border-green-600 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="mot de passe"
                                    type="password" name="password"
                                    required/>
                                </label>
                                <div class="form-check hidden">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} >

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                <!-- You should use a button here, as the anchor is only used for the example  -->
                                <button
                                  class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-green-600 border border-transparent  active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-purple"
                                  type="submit"
                                >
                                    Se connecter
                                </button>

                                <!-- <hr class="my-8" /> -->


                                <p class="mt-4">
                                  <!--<a
                                    class="text-sm font-medium text-green-600 dark:text-purple-400 hover:underline"
                                    href="./forgot-password.html"
                                  >
                                    Forgot your password?
                                  </a>-->
                                </p>
                                <!--<p class="mt-1">
                                  <a
                                    class="text-sm font-medium text-green-600 dark:text-purple-400 hover:underline"
                                    href="./create-account.html"
                                  >
                                    Créer un compte
                                  </a>
                                </p>-->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
@endsection
