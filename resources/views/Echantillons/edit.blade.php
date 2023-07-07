
@extends('layouts.dash')

@include('Echantillons.sidebars')

@section('dashboard')

<div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Echantillons Analyses
            </h2>
            <div
              class="flex items-center justify-between px-0 py-1 mb-2 text-sm font-semibold text-purple-100 bg-transparent rounded-lg focus:outline-none focus:shadow-outline-purple"
              
            >
              <button
                  class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-400 border border-transparent rounded-lg active:bg-purple-600 hover:bg-green-500 focus:outline-none focus:shadow-outline-purple"
                >
                  <a class="rounded-lg p-0 w-full" href="{{route('echantillon.index')}}">Retour</a> 
              </button>
              
            </div>
            <!-- Cards -->
            

            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg  shadow-xs mb-5">
              <div class="w-full overflow-x-auto flex justify-center">
                <form class="w-1/2" method="post" action="{{route('echantillon.update', $echant->id_echantillon)}}">
                <div
                class="px-4 py-3 mb-8 bg-white w-full rounded-lg shadow-md dark:bg-gray-800"
              >
              @csrf
                <h3 class="w-full text-center "> <b>Veuillez inserer les resultats d'analyses</b></h3>
                <x-form-error/>
                
                <label class="block mt-8 text-sm flex justify-center items-center">
                        <span class="text-gray-700 dark:text-gray-400">Resultat</span>
                        <textarea
                            class="block w-1/2 bg-gray-100 pl-2 ml-3 mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        rows="3"
                        placeholder="Saisissez une description" name="analyse_resultat"
                        >
                          @if($resultat != "") 
                            {{$resultat}}
                          @endif
                      </textarea>
                </label>
                <div class="flex mt-6 text-sm">
                  <label class="flex items-center justify-center w-full dark:text-gray-400">
                    <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg cursor-pointer active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"> Enregistrer </button>
                  </label>
                </div>
                </div>
                </form>
              </div>
              
            </div>


            <!-- Charts -->
            
          
          </div>

@endsection
