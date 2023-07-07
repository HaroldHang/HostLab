
@extends('layouts.dash')

@include('Patients.sidebars')


@section('dashboard')

<div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Historique des patients
            </h2>
            <!-- CTA 
            <div
              class="flex items-center justify-between px-0 py-1 mb-2 text-sm font-semibold text-purple-100 bg-transparent rounded-lg focus:outline-none focus:shadow-outline-purple"
              
            >
              <button
                  class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-400 border border-transparent rounded-lg active:bg-purple-600 hover:bg-green-500 focus:outline-none focus:shadow-outline-purple"
                >
                  <a href="/Demandes Analyse/create" class="w-full">Ajouter une demande</a> 
              </button>
              
            </div>-->
            <!-- Cards -->
            

            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg  shadow-xs mb-5">
              <div class="w-full overflow-x-scroll">
                
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-white uppercase border-b dark:border-gray-700 bg-green-300 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-4 py-3">ID</th>
                      <th class="px-4 py-3">Patient</th>
                      <th class="px-4 py-3">Age</th>
                      <th class="px-4 py-3">Nombre de demande</th>
                      <th class="px-4 py-3">Derniere Analyse</th>
                      
                    </tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >

                    @foreach($patients as $patient)
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3 text-sm">
                        {{$loop->iteration}}
                      </td>
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <div
                            class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                          >
                            @if($patient->sexe == "Feminin")
                              <img
                                class="object-cover w-full h-full rounded-full"
                                src="{{asset('Images/woman-profile.png')}}"
                                alt=""
                                loading="lazy"
                              />
                            @else
                              <img
                                class="object-cover w-full h-full rounded-full"
                                src="{{asset('Images/man-profile.png')}}"
                                alt=""
                                loading="lazy"
                              />
                            @endif
                            <div
                              class="absolute inset-0 rounded-full shadow-inner"
                              aria-hidden="true"
                            ></div>
                          </div>
                          <div>
                            <p class="font-semibold">{{$patient->nom}} {{$patient->prenom}}</p>
                            
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3 text-sm">
                        @php
                            $age =  date("Y") - date("Y",strtotime($patient->date_naissance));
                            
                        @endphp
                        {{$age}} ans
                      </td>
                      <td class="px-4 py-3 text-xs">
                        @php
                            $count = 0;
                            foreach($demandes as $demande) {
                              if($demande->patient_id == $patient->identifiant_patient) {
                                $count++;
                              }
                              
                            }
                        @endphp
                        <div class="w-1/2 text-center">
                          {{$count}}
                        </div>
                      </td>
                      <td class="px-4 py-3 text-xs">
                        @php
                          foreach($demandes as $demande){
                              if($demande->patient_id == $patient->identifiant_patient) {
                              
                                  $final = date("d/m/Y",strtotime($demande->date_created));
                              }
                          }
                        @endphp
                        <div class="w-1/2 text-center">
                          {{$final}}
                        </div>
                      </td>
                      
                      
                    </tr>
                    @endforeach
                    
                    

                  </tbody>
                </table>
              </div>
              <div
                class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
              >
                <span class="flex items-center col-span-3">
                  
                </span>
                <span class="col-span-2"></span>
                <!-- Pagination -->
                <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                  <nav aria-label="Table navigation">
                    <ul class="inline-flex items-center">
                      <li>
                        <button
                          class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                          aria-label="Previous"
                        >
                          <svg
                            aria-hidden="true"
                            class="w-4 h-4 fill-current"
                            viewBox="0 0 20 20"
                          >
                            <path
                              d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                              clip-rule="evenodd"
                              fill-rule="evenodd"
                            ></path>
                          </svg>
                        </button>
                      </li>
                      <li>
                        <button
                          class="px-3 py-1 text-white transition-colors duration-150 bg-green-400 border border-r-0 border-green-400 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          1
                        </button>
                      </li>
                      <li>
                        <button
                          class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          2
                        </button>
                      </li>
                      <li>
                        <button
                          class="px-3 py-1  rounded-md focus:outline-none focus:shadow-outline-green"
                        >
                          3
                        </button>
                      </li>
                      <li>
                        <button
                          class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          4
                        </button>
                      </li>
                      <li>
                        <span class="px-3 py-1">...</span>
                      </li>
                      <li>
                        <button
                          class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          8
                        </button>
                      </li>
                      <li>
                        <button
                          class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          9
                        </button>
                      </li>
                      <li>
                        <button
                          class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                          aria-label="Next"
                        >
                          <svg
                            class="w-4 h-4 fill-current"
                            aria-hidden="true"
                            viewBox="0 0 20 20"
                          >
                            <path
                              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                              clip-rule="evenodd"
                              fill-rule="evenodd"
                            ></path>
                          </svg>
                        </button>
                      </li>
                    </ul>
                  </nav>
                </span>
              </div>
            </div>

            <!-- Charts -->
            
          
          </div>

@endsection
