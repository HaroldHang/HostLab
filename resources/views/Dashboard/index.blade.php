@extends('layouts.dash')

@include('Dashboard.sidebars')

@section('template-footer')
{{-- <script src="{{ asset('js/charts-lines.js') }}" defer></script> --}}
<script src="{{ asset('js/charts-pie.js') }}" defer></script>
<script src="{{ asset('js/focus-trap.js') }}" defer></script>
@stop

@section('dashboard')

<div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Tableau de bord
            </h2>
            <!-- CTA -->
            <div
              class="flex items-center justify-between px-0 py-1 mb-2 text-sm font-semibold text-purple-100 bg-transparent rounded-lg focus:outline-none focus:shadow-outline-purple"

            >
              <a
                  class="px-4 py-2 text-sm font-medium leading-5 cursor-pointer text-white transition-colors duration-150 bg-green-400 border border-transparent rounded-lg active:bg-purple-600 hover:bg-green-500 focus:outline-none focus:shadow-outline-purple" href="{{route('demande.index')}}"
                >
                  Voir mes demande
              </a>

            </div>
            <!-- Cards -->

            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-3">
                <!-- Card -->
                <div
                  class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
                >
                  <div
                    class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-orange-100 dark:bg-orange-500"
                  >
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                      <path
                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
                      ></path>
                    </svg>
                  </div>
                  <div>
                    <p
                      class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                    >
                      Total Patients
                    </p>
                    <p
                      class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                    >
                      {{$patients}}
                    </p>
                    <input type="hidden" value="{{$patients}}" name="totalPatient">
                    <input type="hidden" value="{{$demandes}}" name="totalPatientNon">
                  </div>
                </div>
                <!-- Card -->
                <div
                  class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
                >
                  <div
                    class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500"
                  >
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M22 2v20h-20v-20h20zm2-2h-24v24h24v-24zm-4 7h-8v1h8v-1zm0 5h-8v1h8v-1zm0 5h-8v1h8v-1zm-10.516-11.304l-.71-.696-2.553 2.607-1.539-1.452-.698.71 2.25 2.135 3.25-3.304zm0 5l-.71-.696-2.552 2.607-1.539-1.452-.698.709 2.249 2.136 3.25-3.304zm0 5l-.71-.696-2.552 2.607-1.539-1.452-.698.709 2.249 2.136 3.25-3.304z"/>
                    </svg>

                  </div>
                  <div>
                    <p
                      class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                    >
                      Total Demandes Analyses en cours
                    </p>
                    <p
                      class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                    >
                      {{$demandes}}
                    </p>
                    <input type="hidden" value="{{$demandes}}" id="totalDemandeNon">
                    <input type="hidden" value="{{$totDemandes}}" id="totalDemande">
                  </div>
                </div>
                <!-- Card -->
                <div
                  class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
                >
                  <div
                    class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-blue-100 dark:bg-blue-500"
                  >
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M7 16h10v1h-10v-1zm0-1h10v-1h-10v1zm15-13v22h-20v-22h3c1.229 0 2.18-1.084 3-2h8c.82.916 1.771 2 3 2h3zm-11 1c0 .552.448 1 1 1s1-.448 1-1-.448-1-1-1-1 .448-1 1zm9 1h-4l-2 2h-3.898l-2.102-2h-4v18h16v-18zm-13 9h10v-1h-10v1zm0-2h10v-1h-10v1z"/>
                    </svg>
                  </div>
                  <div>
                    <p
                      class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                    >
                     Total Analyses En cours
                    </p>
                    <p
                      class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                    >
                      {{$echantillon}}
                    </p>
                    <input type="hidden" value="{{$totEchantillons}}" id="totalEchant">
                    <input type="hidden" value="{{$echantillon}}" id="totalEchantNon">
                  </div>
                </div>
                <!-- Card
                <div
                  class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
                >
                  <div
                    class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500"
                  >
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                      <path
                        fill-rule="evenodd"
                        d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                        clip-rule="evenodd"
                      ></path>
                    </svg>
                  </div>
                  <div>
                    <p
                      class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                    >
                      Pending contacts
                    </p>
                    <p
                      class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                    >
                      35
                    </p>
                  </div>
                </div> -->
            </div>
            <!-- New Table -->


            <!-- Charts -->

            <h2
                class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
                Diagrammes
            </h2>
            <div class="grid gap-6 mb-8 md:grid-cols-2">
                <div
                  class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
                >
                  <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                    Echantillons Analyses
                  </h4>
                  <canvas id="pie"></canvas>
                  <div
                    class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400"
                  >
                    <!-- Chart legend -->
                    <div class="flex items-center">
                      <span
                        class="inline-block w-3 h-3 mr-1 bg-green-400 rounded-full"
                      ></span>
                      <span>Analyses Termine</span>
                    </div>
                    <div class="flex items-center">
                      <span
                        class="inline-block w-3 h-3 mr-1 bg-green-800 rounded-full"
                      ></span>
                      <span>Analyses En Cours</span>
                    </div>

                  </div>
                </div>
                <div
                  class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
                >
                  <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                    Patients
                  </h4>
                  <canvas id="pie1"></canvas>
                  <div
                    class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400"
                  >
                    <!-- Chart legend -->
                    <div class="flex items-center">
                      <span
                        class="inline-block w-3 h-3 mr-1 bg-green-400 rounded-full"
                      ></span>
                      <span>Patient pris en charge</span>
                    </div>
                    <div class="flex items-center">
                      <span
                        class="inline-block w-3 h-3 mr-1 bg-green-800 rounded-full"
                      ></span>
                      <span>Patient non pris en charge</span>
                    </div>

                  </div>
                </div>
            </div>


            </div>


@endsection
