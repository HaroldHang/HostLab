
@extends('layouts.dash')

@include('Demandes.sidebars')

@section('template-footer')
    <script>
        function closeModal() {
            this.isModalOpen = false
        }
    </script>
@stop

@section('dashboard')

<div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Tableau de bord Demande Analyses
            </h2>
            <!-- CTA -->
            <div
              class="flex items-center justify-between px-0 py-1 mb-2 text-sm font-semibold text-purple-100 bg-transparent rounded-lg focus:outline-none focus:shadow-outline-purple"

            >
              <button
                  class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-400 border border-transparent rounded-lg active:bg-purple-600 hover:bg-green-500 focus:outline-none focus:shadow-outline-purple"
                >
                  <a href="/Demandes Analyse/newpatient" class="w-full">Ajouter une demande</a>
              </button>

            </div>
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
                      <th class="px-4 py-3">Echantillons</th>
                      <th class="px-4 py-3">Priorite</th>
                      <th class="px-4 py-3">Status</th>
                      <th class="px-4 py-3">Responsable</th>
                      <th class="px-4 py-3">Ajoute le</th>
                      <th class="px-4 py-3">Rendre le</th>
                      <th class="px-4 py-3">Resultat</th>
                    </tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >

                    @foreach($demandes as $demande)
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3 text-sm">
                        {{$loop->iteration}}
                      </td>
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <div
                            class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                          >
                            @if($patients[$loop->index]->sexe == "Feminin")
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
                            <p class="font-semibold patient_name">{{$patients[$loop->index]->nom}} {{$patients[$loop->index]->prenom}}</p>

                          </div>
                          <span class="hidden patient_age">
                          @php
                            $age =  date("Y") - date("Y",strtotime($patients[$loop->index]->date_naissance));
                          @endphp
                              {{$age}} ans
                          </span>

                        </div>
                      </td>
                      <td class="px-4 py-3 text-sm text-center">
                        {{$demande->nbr_echantillon}}
                      </td>
                      <td class="px-5 py-3 text-xs">
                      @switch($demande->priorite)
                        @case("Tres Urgent")
                            <span
                              class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-green-700 dark:text-green-100"
                            >
                              Tres Urgent
                            </span>
                            @break

                        @case("Urgent")
                            <span
                              class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:bg-green-700 dark:text-green-100"
                            >
                              Urgent
                            </span>
                            @break
                        @default
                            <span
                              class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:bg-green-700 dark:text-green-100"
                            >
                              Non Urgent
                            </span>
                        @endswitch

                      </td>
                      <td class="px-5 py-3 text-xs">
                        @if($demande->status_demande == "Termine")
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
                      <td class="px-4 py-3 text-sm">
                        @foreach($technicians as $technician)
                          @if($technician->identifiant_user == $demande->technicien_id)
                              {{$technician->pseudo}}
                          @endif
                        @endforeach
                      </td>
                      <td class="px-4 py-3 text-sm">
                        {{$demande->date_created}}
                      </td>
                      <td class="px-4 py-3 text-sm">
                        {{$demande->date_delivrance}}
                      </td>
                      <td class="px-4 py-3 text-sm">
                      <div class="flex items-center space-x-4 text-sm">
                            <button
                              @click="openModal"
                              class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-green-400 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray result-btn"
                              aria-label="Delete" data-result = "result{{$loop->iteration}}"
                            >
                              <svg
                                class="w-5 h-5"
                                aria-hidden="true"
                                fill="currentColor"
                                width="24" height="24"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                              >
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16 12C16 14.2091 14.2091 16 12 16C9.79086 16 8 14.2091 8 12C8 9.79086 9.79086 8 12 8C14.2091 8 16 9.79086 16 12ZM14 12C14 13.1046 13.1046 14 12 14C10.8954 14 10 13.1046 10 12C10 10.8954 10.8954 10 12 10C13.1046 10 14 10.8954 14 12Z" fill="currentColor" /><path fill-rule="evenodd" clip-rule="evenodd" d="M12 3C17.5915 3 22.2898 6.82432 23.6219 12C22.2898 17.1757 17.5915 21 12 21C6.40848 21 1.71018 17.1757 0.378052 12C1.71018 6.82432 6.40848 3 12 3ZM12 19C7.52443 19 3.73132 16.0581 2.45723 12C3.73132 7.94186 7.52443 5 12 5C16.4756 5 20.2687 7.94186 21.5428 12C20.2687 16.0581 16.4756 19 12 19Z" fill="currentColor" />
                              </svg>
                            </button>
                            <input type="hidden" value="{{$resultats[$loop->index]}}" id="result{{$loop->iteration}}">
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

@section('modalSection')
<div
      x-show="isModalOpen"
      x-transition:enter="transition ease-out duration-150"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100"
      x-transition:leave="transition ease-in duration-150"
      x-transition:leave-start="opacity-100"
      x-transition:leave-end="opacity-0"
      class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
    >
      <!-- Modal -->
      <div
        x-show="isModalOpen"
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 transform translate-y-1/2"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0  transform translate-y-1/2"
        @click.away="closeModal"
        @keydown.escape="closeModal"
        class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
        role="dialog"
        id="modal"
      >
        <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
        <header class="flex justify-end">
          <button
            class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
            aria-label="close"
            @click="closeModal"
          >
            <svg
              class="w-4 h-4"
              fill="currentColor"
              viewBox="0 0 20 20"
              role="img"
              aria-hidden="true"
            >
              <path
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd"
                fill-rule="evenodd"
              ></path>
            </svg>
          </button>
        </header>
        <!-- Modal body -->
        <div class="mt-4 mb-6">
          <!-- Modal title -->
          <h1 class="w-full text-center p-5 font-bold">BULLETIN D'EXAMENS</h1>
          <h3>Nom et Prenoms: <span id="patient_id"></span></h3>
          <h4 class="w-full">Age : <span id="patient_year"></span></h4>
          <p
            class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300"
          >
            Resultats analyses
          </p>
          <!-- Modal description -->
          <p class="text-sm text-gray-700 dark:text-gray-400" id="modal-content">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nostrum et
            eligendi repudiandae voluptatem tempore!
          </p>
        </div>
      </div>
    </div>

    @endsection
