@extends('layouts.dash')

@include('Analyses.sidebars')

@section('dashboard')
<div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Test (analyses enregistres) / Ajouter un test
            </h2>
            <!-- CTA -->
            <div
              class="flex items-center justify-between px-0 py-1 mb-2 text-sm font-semibold text-purple-100 bg-transparent rounded-lg focus:outline-none focus:shadow-outline-purple"
              
            >
              <button
                  class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-400 border border-transparent rounded-lg active:bg-purple-600 hover:bg-green-500 focus:outline-none focus:shadow-outline-purple"
                >
                  <a class="rounded-lg p-0 w-full" href="/tests/">Retour</a> 
              </button>
              
            </div>
            <!-- Cards -->
            

            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg  shadow-xs mb-5">
              <div class="w-full overflow-x-auto flex justify-center">
                <form class="w-1/2" method="post" action="{{route('test.update', $test->identifiant_test)}}">
                <div class="px-4 py-3 mb-8 bg-white w-full rounded-lg shadow-md dark:bg-gray-800">
                    <x-form-error/>
                    @csrf
                    <label class="block text-sm mt-8 flex justify-center items-center">
                        <span class="text-gray-700 dark:text-gray-400">Nom</span>
                        <input
                            class="block bg-gray-100 h-10 pl-5  w-1/2 ml-7 mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            name="nom_test" value="{{$test->nom_test}}"
                        />
                    </label>
                    <label class="block text-sm mt-8 flex justify-center items-center">
                        <span class="text-gray-700 dark:text-gray-400">Acronyme</span>
                        <input
                            class="block bg-gray-100 h-10 pl-5  w-1/2 ml-7 mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            name="acronyme_test" value="{{$test->acronyme_test}}"
                        />
                    </label>
                    <label class="block mt-8 text-sm flex justify-center items-center">
                        <span class="text-gray-700 dark:text-gray-400">Description</span>
                        <textarea
                            class="block w-1/2 bg-gray-100 pl-2 ml-3 mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        rows="3"
                        placeholder="Saisissez une description" name="description"
                        >{{$test->description}}</textarea>
                    </label>
                    <label class="block text-sm mt-8 flex justify-center items-center">
                        <span class="text-gray-700 dark:text-gray-400">Normes</span>
                        <input
                            class="block bg-gray-100 h-10 pl-5  w-1/2 ml-7 mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            name="normes_test" value="{{$test->normes}}"
                        />
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