
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
                <div class="  w-36 border-green-400 border-b-2 ml-0\.5">
                    <button
                        class="w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-400 border-none active:bg-purple-600 hover:bg-green-500 focus:outline-none focus:shadow-outline-purple"
                    >
                        <a class="w-full text-center"> Patient </a>
                    </button>
                </div>
                <div class="w-36 bg-white border-green-400 border-t-2 border-r-2  rounded-tr-lg">
                    <button
                        class=" w-full px-4 py-2 text-center text-sm font-medium leading-5 text-green-400 -m transition-colors duration-150 bg-transparent rounded-t-lg  focus:outline-none focus:shadow-outline-purple"
                    >
                    <a class="w-full"> Echantillons </a> 
                    </button>
                </div>
                <div class="w-full border-green-400 border-b-2 ml-0\.5">
                    <button class="px-4 py-2 text-center text-sm font-medium leading-5 bg-transparent opacity-0 cursor-default">
                        <a>hjfvgfd</a>
                    </button>
                </div>
                
              </div>
                <div class="w-full overflow-x-auto bg-white">
                    <form class="px-10 py-5 mt-10 w-full flex-col justify-center" method="post" action="/Echantillon Analyse/store">
                        @csrf
                        @for ($i = 0; $i < $echantNbr; $i++)
                        <div class=" px-3 py-3 w-2/3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                            <h3>Echantillon {{$i + 1}} </h3>
                            <div class="px-1 py-1 w-full" >
                            <label class="text-sm m-2 flex justify-between items-center">
                                <span class="text-gray-700 dark:text-gray-400">Type</span>
                                <select
                                    class="inline w-1/2 h-10 pl-5 mt-1 text-sm bg-gray-100 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="echant{{$i + 1}}"
                                >
                                    <option value=" "></option>
                                    @foreach($echant as $newechant)
                                    <option value="{{$newechant->identifiant_type}}">{{$newechant->nom_type}}</option>
                                    @endforeach
                                    <!--
                                    <option>$5,000</option>
                                    <option>$10,000</option>
                                    <option>$25,000</option>-->
                                </select>
                            </label>
                            <label class="block text-sm m-2 flex justify-between items-center">
                                <span class="text-gray-700 dark:text-gray-400">Tests a effectuer</span>
                                <div class="grid grid-cols-2 justify-start ml-2 text-sm w-1/2">
                                    
                                    @foreach($tests as $test)
                                    <label class="flex items-center dark:text-gray-400">
                                      <input
                                        type="checkbox"
                                        class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="echantTest{{$i + 1}}[]" value="{{$test->identifiant_test}}"
                                      />
                                      <span class="ml-2">
                                        {{$test->nom_test}}({{$test->acronyme_test}})
                                      </span>
                                    </label>
                                    @endforeach
                                    
                                  </div>
                              </label>
              
              
                            </div>
                        </div>
                        @endfor
                        
                        <input type="hidden" value="{{$patient}}" name="currentPatient"/>
                        <input type="hidden" value="{{$urg}}" name="urgDemande"/>
                      <div class="block w-2/3 flex justify-end">
                          <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-400 border-none active:bg-purple-600 hover:bg-green-500 focus:outline-none focus:shadow-outline-purple">
                            Continuer
                          </button>
                      </div>
                    </form>
                </div>
                
              </div>
  
            <!-- Charts -->
            
          
          </div>
@endsection
