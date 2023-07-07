@extends('layouts.dash')

@include('Users.sidebars')

@section('dashboard')

<div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Type Echantillons/ Ajouter un type
            </h2>
            <!-- CTA -->
            <div
              class="flex items-center justify-between px-0 py-1 mb-2 text-sm font-semibold text-purple-100 bg-transparent rounded-lg focus:outline-none focus:shadow-outline-purple"
              
            >
              <button
                  class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-400 border border-transparent rounded-lg active:bg-purple-600 hover:bg-green-500 focus:outline-none focus:shadow-outline-purple"
                >
                  <a class="rounded-lg p-0 w-full">Retour</a> 
              </button>
              
            </div>
            <!-- Cards -->
            

            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg  shadow-xs mb-5">
              <div class=" w-full overflow-x-auto flex justify-center">
              <div class=" w-full flex flex-col overflow-y-auto md:flex-row">
                    <div class="aform flex items-center justify-start p-6 sm:p-12 md:w-1/2">
                        <form class="flex items-center justify-start w-full h-full" method="POST" action="{{route('register') }}">
                            @csrf
                            @error('nom')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @error('prenom')
                                <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                            @enderror
                            @error('pseudo')
                                  <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                  </span>
                            @enderror
                            @error('role')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                            @enderror
                            @error('mdp')
                                  <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                  </span>
                            @enderror
                            
                            <div class="w-3/4 h-full">
                                <h1
                                    class="mb-4 text-xl text-center font-semibold text-gray-700 dark:text-gray-200"
                                >
                                    Ajoutez un utilisateur
                                </h1>
                                <label class="block text-sm mt-4">
                                    <span class="text-gray-700 dark:text-gray-400">Prénom</span>
                                    <input
                                      class="block w-full mt-1 text-sm border-2 border-green-200 px-3 py-2 transition-border duration-50 dark:border-gray-600 dark:bg-gray-700 focus:border-green-600 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                      placeholder="Prénom" name="prenom"
                                    />
                                </label>
                                <label class="block text-sm mt-4">
                                    <span class="text-gray-700 dark:text-gray-400">Nom</span>
                                    <input
                                      class="block w-full mt-1 text-sm border-2 border-green-200 px-3 py-2 transition-border duration-50 dark:border-gray-600 dark:bg-gray-700 focus:border-green-600 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                      placeholder="Nom" name="nom"
                                    />
                                </label>
                                <label class="block text-sm mt-4">
                                  <span class="text-gray-700 dark:text-gray-400">Pseudo</span>
                                  <input
                                    class="block w-full mt-1 text-sm border-2 border-green-200 px-3 py-2 transition-border duration-50 dark:border-gray-600 dark:bg-gray-700 focus:border-green-600 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="Pseudo" name="pseudo"
                                  />
                                </label>
                                <label class="block mt-4 text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">
                                      Poste
                                    </span>
                                    <select
                                        class="block w-full mt-1 text-sm border-2 border-green-200 px-3 py-2 transition-border duration-50 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-green-600 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="role"
                                    >
                                        <!--<option value="Responsable technicien">Responsable Technicien</option>-->
                                        <option value="Technicien laboratoire">Technicien Laboratoire</option>
                            
                                    </select>
                                  </label>
                                <label class="block mt-4 text-sm">
                                  <span class="text-gray-700 dark:text-gray-400">Mot de passe</span>
                                  <input
                                    class="block w-full mt-1 text-sm border-2 border-green-200 px-3 py-2 transition-border duration-50 dark:border-gray-600 dark:bg-gray-700 focus:border-green-600 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="mot de passe"
                                    type="password" name="password"
                                  />
                                </label>
                  
                                <!-- You should use a button here, as the anchor is only used for the example  -->
                                <button
                                  class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-green-600 border border-transparent  active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-purple"
                                  type="submit"
                                >
                                  Continuer
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
                                <!--
                                <p class="mt-1">
                                  <button
                                    class="text-sm font-medium text-green-600 dark:text-purple-400 hover:underline"
                                    type="submit"
                                  >
                                    Se connecter
                                  </button>
                                </p>-->
                            </div>
                        </form>
                    </div> 
                    <div class="illustrator p-3 h-32 md:h-auto md:w-1/2">
                        <img
                            aria-hidden="true"
                            class="object-cover w-full h-full dark:hidden"
                            src="{{asset('Images/Laboratory Analyst_Two Color.png')}}"
                            alt="Laboratory"
                        />
                    </div>
                </div>
              </div>
              
            </div>

            <!-- Charts -->
            
          
          </div>

@endsection