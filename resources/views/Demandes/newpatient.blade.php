
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
                    <form class="px-10 py-5 mt-10 w-full flex-col justify-center" method="post" action="/Patients/store">
                        @csrf
                        <div
                        class="px-4 py-3 w-2/3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
                      >
                        <label class="text-sm m-5 flex justify-between items-center">
                          <span class="text-gray-700 dark:text-gray-400">Nom</span>
                          <input
                            class="inline w-1/2 h-10 pl-5 mt-1 text-sm bg-gray-100 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="DANHOUE" type="text" name="patient_surname"
                          />
                        </label>
                        <label class="block text-sm m-5 flex justify-between items-center">
                            <span class="text-gray-700 dark:text-gray-400">Prenom</span>
                            <input
                                class="inline w-1/2 h-10 pl-5 mt-1 text-sm bg-gray-100 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                              placeholder="Jean" type="text" name="patient_name"
                            />
                          </label>
                        <div class="m-5 text-sm flex justify-between items-center">
                          <span class="text-gray-700 dark:text-gray-400">
                            Sexe
                          </span>
                          <div class="mt-2 inline">
                            <label
                              class="inline-flex items-center text-gray-600 dark:text-gray-400"
                            >
                              <input
                                type="radio"
                                class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                name="sexe"
                                value="Masculin"
                              />
                              <span class="ml-2">Masculin</span>
                            </label>
                            <label
                              class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400"
                            >
                              <input
                                type="radio"
                                class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                name="sexe"
                                value="Feminin"
                              />
                              <span class="ml-2">Feminin</span>
                            </label>
                          </div>
                        </div>
          
                        <label class="block text-sm m-5 flex justify-between items-center">
                            <span class="text-gray-700 dark:text-gray-400">Date de naissance</span>
                            <input
                                class="inline w-1/2 h-10 pl-5 mt-1 text-sm bg-gray-100 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                              placeholder="Jane Doe" type="date" name="date_birth"
                            />
                        </label>

                        <label class="block text-sm m-5 flex justify-between items-center">
                            <span class="text-gray-700 dark:text-gray-400">Nombre d'echantillon a analyser</span>
                            <input
                                class="inline w-1/2 h-10 pl-5 mt-1 text-sm bg-gray-100 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                              placeholder="3" type="number" name="echant_nombre"
                            />
                        </label>

                        <label class="block text-sm m-5 flex justify-between items-center">
                                <span class="text-gray-700 dark:text-gray-400">Priorité</span>
                                <select
                                    class="inline w-1/2 h-10 pl-5 mt-1 text-sm bg-gray-100 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" name="urgence_demande"
                                >
                                    <option value="Non Urgent">Non Urgent</option>
                                    <option value="Urgent">Urgent</option>
                                    <option value="Tres Urgent">Très Urgent</option>
                                </select>
                        </label>
          
                      </div>
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
