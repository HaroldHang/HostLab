
@extends('layouts.dash')

@include('Echantillons.sidebars')

@section('dashboard')

<div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Echantillons Analyses
            </h2>
            <!-- CTA 
            <div
              class="flex items-center justify-between px-0 py-1 mb-2 text-sm font-semibold text-purple-100 bg-transparent rounded-lg focus:outline-none focus:shadow-outline-purple"
              
            >
              <button
                  class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-400 border border-transparent rounded-lg active:bg-purple-600 hover:bg-green-500 focus:outline-none focus:shadow-outline-purple"
                >
                  <a class="w-full h-full" href="/echantillons type/create">Ajouter</a> 
              </button>
            
            </div> -->
            <!-- Cards -->
            

            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg  shadow-xs mb-5">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-white uppercase border-b dark:border-gray-700 bg-green-300 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-4 py-3 text-center">No</th>
                      <th class="px-4 py-3 text-center">Identifiant Echantillon</th>
                      <th class="px-4 py-3 text-center">Demande No</th>
                      <th class="px-4 py-3 text-center">Type echantillon </th>
                      <th class="px-4 py-3 text-center">Nombre d'Analyse</th>
                      <th class="px-4 py-3 text-center">Status</th>
                      <!-- <th class="px-4 py-3">Modifie le</th> -->
                      <th class="px-4 py-3 text-center">Actions</th>
                    </tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >
                    @foreach($echantillons as $echantillon)
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3 text-sm text-center">
                        {{$loop->iteration}}
                      </td>
                      <td class="px-4 py-3 text-sm text-center">
                        #{{$echantillon->unique_id}}
                      </td>
                      <td class="px-4 py-3 text-sm text-center">
                        {{$echantillon->id_demande}}
                      </td>
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm text-center">
                          <!-- Avatar with inset shadow -->
                          <div class="text-center">
                            <p class="font-semibold text-center">{{$nature[$echantillon->echantillon_type - 1]->nom_type}}</p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3 text-sm text-center">
                        {{$echantillon->test_effectuer}}
                      </td>
                      <td class="px-5 py-3 text-xs">
                          @if($echantillon->status_echantillon == "Termine")
                            <span
                                class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                            >
                                Termine
                            </span>
                          @else
                            <span
                              class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:bg-green-700 dark:text-green-100"
                            >
                                En Cours
                            </span>
                          @endif
                      </td>
                      <!--
                      <td class="px-4 py-3 text-sm">
                        6/10/2020
                      </td>
                      <td class="px-4 py-3 text-sm">
                        6/10/2020
                      </td>-->
                      <td class="px-4 py-3 text-sm text-center">
                        <div class="flex items-center space-x-4 text-sm text-center">
                            <a
                              class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-green-400 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                              aria-label="Edit" href="{{route('echantillon.edit',$echantillon->id_echantillon)}}"
                            >
                              <svg
                                class="w-5 h-5"
                                aria-hidden="true"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                              >
                                <path
                                  d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                                ></path>
                              </svg>
                            </a>
                            <a
                              class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-green-400 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                              aria-label="Edit" href="{{route('echantillon.complete',$echantillon->id_echantillon)}}"
                            > 
                              <svg
                                class="w-5 h-5"
                                aria-hidden="true"
                                fill="currentColor"
                                width="24" height="24"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                              >
                                <path d="M10.5858 13.4142L7.75735 10.5858L6.34314 12L10.5858 16.2427L17.6568 9.1716L16.2426 7.75739L10.5858 13.4142Z" fill="currentColor" />
                              </svg>
                              
                            </a>
                            <button
                              class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-green-400 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                              aria-label="Delete"
                            >
                              <svg
                                class="w-5 h-5"
                                aria-hidden="true"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                              >
                                <path
                                  fill-rule="evenodd"
                                  d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                  clip-rule="evenodd"
                                ></path>
                              </svg>
                            </button>
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
