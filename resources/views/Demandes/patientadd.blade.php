
@extends('layouts.dash')

@include('Demandes.sidebars')

@section('dashboard')

<div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Tableau de bord Demande Analyses
            </h2>
            
            <!-- CTA -->
            
            <!-- Cards -->
            

            <!-- New Table -->
            
            <div class="w-full overflow-hidden rounded-lg bg-transparent  shadow-xs mb-5">
                <div
                class="w-full flex items-center justify-start  px-0 py-0 mt-0 text-sm font-semibold text-purple-100 bg-transparent rounded-t-lg focus:outline-none focus:shadow-outline-purple"
                
              >
                <div class=" w-36 bg-white border-green-400 border-t-2 border-r-2  rounded-tl-lg">
                    <button
                        class=" w-full px-4 py-2 text-center text-sm font-medium leading-5 text-green-400 -m transition-colors duration-150 bg-transparent rounded-t-lg  focus:outline-none focus:shadow-outline-purple"
                    >
                        <a class="w-full text-center"> Patient </a>
                    </button>
                </div>
                <div class="w-full border-green-400 border-b-2 ml-0\.5">
                    <button
                    class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-400 border-none active:bg-purple-600 hover:bg-green-500 focus:outline-none focus:shadow-outline-purple"
                    >
                    <a class="w-full"> Echantillons </a> 
                    </button>
                </div>
                
              </div>
                <div class="w-full overflow-x-auto bg-white">
                    <div
                    class="w-full flex items-center justify-around px-20 pb-10 mt-8 text-sm font-semibold text-purple-100 bg-transparent rounded-lg focus:outline-none focus:shadow-outline-purple"
                    
                  >
                    <button
                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-400 border border-transparent rounded-lg active:bg-purple-600 hover:bg-green-500 focus:outline-none focus:shadow-outline-purple"
                      >
                        <a class="w-full h-full" href="#"> Ancien Patient </a>
                    </button>
                    <button
                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-400 border border-transparent rounded-lg active:bg-purple-600 hover:bg-green-500 focus:outline-none focus:shadow-outline-purple"
                      >
                      <a class="w-full h-full" href="/Demandes Analyse/newpatient"> Nouveau Patient </a> 
                    </button>
                  </div>
                </div>
                
              </div>
  
            <!-- Charts -->
            
          
          </div>

@endsection
