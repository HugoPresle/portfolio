@extends('asset.header')

@section('content')
    <section class="bg-white">

        <button data-drawer-target="cta-button-sidebar" data-drawer-toggle="cta-button-sidebar"
            aria-controls="cta-button-sidebar" type="button"
            class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd" fill-rule="evenodd"
                    d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                </path>
            </svg>
        </button>

        <aside id="cta-button-sidebar"
            class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
            aria-label="Sidebar">
            <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50">
                <div class="text-center">
                    <img class="w-24 h-24 rounded-md lg:w-32 lg:h-32 p-0 mx-auto"
                        src="{{ asset('portfolioFile/logo1.png') }}" alt="avatar" onclick="portMenu('home')">
                    <h1 class="text-2xl font-semibold text-gray-800 lg:text-3xl">Presle <span
                            class="text-blue-500">Hugo</span></h1>
                    <p class="text-gray-500">Développeur <span class="text-blue-500">web</span></p>
                </div>
                <hr class="my-3">
                <ul id="ulMenu" class="space-y-2 font-medium mt-6">
                    <li class="hidden"><a id="homeA"><i></i></a></li>
                    <li>
                        <a onclick="portMenu('comp')" id="compA"
                            class="flex items-center p-2 cursor-pointer rounded-lg text-gray-800 hover:text-blue-500">
                            <span class="ms-3"><i class="fa-solid fa-list-check fa-lg mr-3"></i>Compétences</span>
                        </a>
                    </li>
                    <li>
                        <a onclick="portMenu('proj')" id="projA"
                            class="flex items-center p-2 cursor-pointer rounded-lg text-gray-800 hover:text-blue-500">
                            <span class="ms-3"><i class="fa-solid fa-folder-open fa-lg mr-3"></i>Projets et
                                Experiences</span>
                        </a>
                    </li>
                    <li>
                        <a onclick="portMenu('etud')" id="etudA"
                            class="flex items-center p-2 cursor-pointer rounded-lg text-gray-800 hover:text-blue-500">
                            <span class="ms-3"><i class="fa-solid fa-graduation-cap fa-lg mr-3"></i>Études</span>
                        </a>
                    </li>
                    <li>
                        <a onclick="portMenu('conta')" id="contaA"
                            class="flex items-center p-2 cursor-pointer block rounded-lg text-gray-800 hover:text-blue-500">
                            <span class="ms-3"><i class="fa-solid fa-address-book fa-lg mr-3"></i>Contact</span>
                        </a>
                    </li>
                    <li>
                        <a id="readMoreExpA" class="hidden"><i></i></a>
                        <a id="readMoreCompA" class="hidden"><i></i></a>
                        <a id="readMoreProjA" class="hidden"><i></i></a>
                    </li>

                </ul>
                {{-- <div id="dropdown-cta" class="p-4 mt-6 rounded-lg bg-blue-50" role="alert">
                    <div class="flex items-center mb-3">
                        <span class="bg-blue-100 text-blue-800 text-sm font-semibold me-2 px-2.5 py-0.5 rounded">En
                            Développement</span>
                        <button type="button"
                            class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 inline-flex justify-center items-center w-6 h-6 text-blue-900 rounded-lg focus:ring-2 focus:ring-blue-400 p-1 hover:bg-blue-200 h-6 w-6"
                            data-dismiss-target="#dropdown-cta" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                    <p class="mb-3 text-sm text-blue-800">
                        Le site est en cours de développement, certaines fonctionnalités ne sont pas encore disponibles.
                        Merci de votre compréhension.
                    </p>
                </div> --}}
            </div>
        </aside>

        <div class="p-4 sm:ml-64">
            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg">
                <div class="flex-1 mt-8 lg:mx-12 lg:mt-0" id="menu">
                    <div id="home" class="flex rounded-lg min-h-screen">
                        <section class="bg-white">
                            <div class="max-w-6xl px-6 py-10 mx-auto">
                                <p class="text-xl font-medium text-blue-500 ">Portfolio</p>

                                <h1 class="mt-2 text-2xl font-semibold text-gray-800 lg:text-3xl">
                                    Bienvenue sur mon <span class="underline decoration-blue-500">Portfolio</span>
                                </h1>

                                <main class="relative z-20 w-full mt-8 md:flex md:items-center xl:mt-12">
                                    <div class="absolute w-full bg-blue-600 -z-10 md:h-96 rounded-2xl"></div>

                                    <div
                                        class="w-full p-6 bg-blue-600 md:flex md:items-center rounded-2xl md:bg-transparent md:p-0 lg:px-12 md:justify-evenly">
                                        <img class="h-24 w-24 md:mx-6 rounded-full object-cover shadow-md md:h-[32rem] md:w-80 lg:h-[36rem] lg:w-[26rem] md:rounded-2xl"
                                            src="{{ '/portfolioFile/C05BB84E-EAB3-41CA-A155-54018EB5DA56_1_105_c.jpeg' }}"
                                            alt="">

                                        <div class="mt-2 md:mx-6">

                                            <p class="mt-4 text-lg leading-relaxed text-white md:text-xl">
                                                "Jeune développeur passionné par le monde du web et de la
                                                programmation. Fasciné par la capacité de transformer une idée en réalité
                                                grâce au code, j'ai décidé de me plonger dans cet univers captivant.
                                                Aujourd'hui, je suis ravi de partager avec vous mon portfolio qui est le
                                                reflet de mon parcours, de mes compétences et de ma passion pour le
                                                développement web. J'espère que vous apprécierez la visite !"
                                            </p>
                                        </div>
                                    </div>
                                </main>
                            </div>
                        </section>
                    </div>
                    <div id="comp" class="flex rounded-lg min-h-screen hidden">
                        <section class="bg-white">
                            <div class="container px-6 py-10 mx-auto">
                                <h1 class="text-2xl font-semibold text-gray-800 lg:text-3xl">Liste
                                    de <br> <span class="underline decoration-blue-500">Mes Compétence</span>
                                </h1>

                                <p class="mt-4 text-gray-500 xl:mt-6">
                                    Au cours de mes études et de mes expériences professionnelles, j'ai acquis un certain
                                    nombre de compétences techniques et fonctionnelles. Voici une liste de mes compétences:
                                </p>
                                <div class="flex items-center space-x-4 mt-4">
                                    <div class="w-4 h-4 bg-blue-500 rounded"></div>
                                    <p class="text-gray-700">= Compétences techniques</p>
                                    <div class="w-4 h-4 bg-stone-500 rounded"></div>
                                    <p class="text-gray-700">= Compétences fonctionnelles</p>
                                </div>
                                <div class="grid grid-cols-1 gap-8 mt-8 xl:mt-12 xl:gap-12 md:grid-cols-1 xl:grid-cols-3"
                                    id="lstComp">
                                </div>
                            </div>
                        </section>
                    </div>
                    <div id="proj" class="flex rounded-lg min-h-screen hidden">
                        {{-- <section class="bg-white">
                            <div class="container px-6 py-10 mx-auto">
                                <h1 class="text-2xl font-semibold text-gray-800 capitalize lg:text-3xl">
                                    <span class="underline decoration-blue-500">Projets</span>
                                </h1>
                                <p class="mt-4 text-gray-500 xl:mt-6">
                                    Liste de mes projets personnels et professionnels. Vous trouverez ici une sélection de
                                    mes projets les plus récents et les plus significatifs. N'hésitez pas à cliquer sur les
                                    images pour en savoir plus sur chaque projet.
                                </p>

                                <div class="grid grid-cols-1 gap-8 mt-8 xl:mt-12 xl:gap-12 md:grid-cols-1 xl:grid-cols-3">
                                </div>
                            </div>
                        </section> --}}
                        <section class="bg-white">
                            <div class="container px-6 py-10 mx-auto">
                                <div>
                                    <h1 class="text-2xl font-semibold text-gray-800 capitalize lg:text-3xl">Mes Projets
                                    </h1>

                                    <div class="mt-2">
                                        <span class="inline-block w-3 h-1 ml-1 bg-blue-500 rounded-full"></span>
                                        <span class="inline-block w-1 h-1 ml-1 bg-blue-500 rounded-full"></span>
                                        <span class="inline-block w-40 h-1 bg-blue-500 rounded-full"></span>
                                    </div>
                                </div>

                                <div class="mt-8 lg:-mx-6 lg:flex lg:items-center ">
                                    <img class="object-cover w-full lg:mx-6 lg:w-1/2 rounded-xl h-72 lg:h-96 border-2 border-blue-500"
                                        src="{{ 'portfolioFile/proj/040-Faombre.png' }}" alt="">

                                    <div class="mt-6 lg:w-1/2 lg:mt-0 lg:mx-6 ">
                                        <p class="text-sm text-blue-500 uppercase">ASTAR Game</p>

                                        <a class="block mt-4 text-2xl font-semibold text-gray-800 hover:underline">
                                            Jeu de rôle en ligne
                                        </a>

                                        <p class="mt-3 text-sm text-gray-500 md:text-sm">
                                            ASTAR est un jeu de rôle en ligne palpitant, qui vous plonge dans un univers
                                            fantastique rempli de monstres à collectionner et à entraîner. Dans ce monde,
                                            vous commencerez votre aventure en invoquant des monstres avec des GemStars et
                                            vous les ferez évoluer au fil des combats et...
                                        </p>

                                        <a onclick="showProj('astar')"
                                            class="inline-block mt-2 text-blue-500 underline hover:text-blue-400 cursor-pointer">Lire
                                            plus
                                        </a>
                                    </div>
                                </div>

                                <div class="mt-8 lg:-mx-6 lg:flex lg:items-center">
                                    <img class="object-cover w-full lg:mx-6 lg:w-1/2 rounded-xl h-72 lg:h-96 border-2 border-blue-500"
                                        src="{{ 'portfolioFile/proj/Capture d’écran 2024-05-25 à 12.02.40.png' }}"
                                        alt="">

                                    <div class="mt-6 lg:w-1/2 lg:mt-0 lg:mx-6 ">
                                        <p class="text-sm text-blue-500 uppercase">PokExpert</p>

                                        <a class="block mt-4 text-2xl font-semibold text-gray-800 hover:underline">
                                            Outils Statisques
                                        </a>

                                        <p class="mt-3 text-sm text-gray-500 md:text-sm">
                                            Je suis heureux de vous présenter PokExpert, un projet que j'ai développé en
                                            solo et de manière autodidacte. PokExpert est un site web conçu spécialement
                                            pour les joueurs de Pokémon. Il offre un outil de gestion de listes permettant
                                            aux utilisateurs de suivre leur progression dans...
                                        </p>
                                        <a onclick="showProj('pokexpert')"
                                            class="inline-block mt-2 text-blue-500 underline hover:text-blue-400 cursor-pointer">Lire
                                            plus
                                        </a>
                                    </div>
                                </div>

                                <div class="mt-8 lg:-mx-6 lg:flex lg:items-center">
                                    <img class="object-cover w-full lg:mx-6 lg:w-1/2 rounded-xl h-72 lg:h-96 border-2 border-blue-500"
                                        src="{{ 'portfolioFile/proj/OIG1 (1).jpeg' }}" alt="">

                                    <div class="mt-6 lg:w-1/2 lg:mt-0 lg:mx-6 ">
                                        <p class="text-sm text-blue-500 uppercase">Requin</p>

                                        <a class="block mt-4 text-2xl font-semibold text-gray-800 hover:underline">
                                            Script Pyhton
                                        </a>

                                        <p class="mt-3 text-sm text-gray-500 md:text-sm">
                                            Dans le cadre de mon travail, j'ai entrepris un projet en solo visant à
                                            améliorer l'efficacité et la productivité de notre équipe. Pour ce faire, j'ai
                                            développé une série de scripts automatisant diverses tâches répétitives et
                                            chronophages, que j'ai intégrés dans un programme unique en Python, accessible à
                                            tous. Ce programme regroupe plusieurs...
                                        </p>

                                        <a onclick="showProj('requin')"
                                            class="inline-block mt-2 text-blue-500 underline hover:text-blue-400 cursor-pointer">Lire
                                            plus
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="bg-white">
                            <div class="container px-6 py-10 mx-auto">
                                <div>
                                    <h1 class="text-2xl font-semibold text-gray-800 capitalize lg:text-3xl">Mes Expériences
                                    </h1>

                                    <div class="mt-2">
                                        <span class="inline-block w-3 h-1 ml-1 bg-blue-500 rounded-full"></span>
                                        <span class="inline-block w-1 h-1 ml-1 bg-blue-500 rounded-full"></span>
                                        <span class="inline-block w-40 h-1 bg-blue-500 rounded-full"></span>
                                    </div>
                                </div>

                                <div class="mt-8 lg:-mx-6 lg:flex lg:items-center">
                                    <img class="object-cover w-full lg:mx-6 lg:w-1/2 rounded-xl h-72 lg:h-96"
                                        src="{{ 'portfolioFile/OIG4.jpeg' }}" alt="">

                                    <div class="mt-6 lg:w-1/2 lg:mt-0 lg:mx-6 ">
                                        <p class="text-sm text-blue-500 uppercase">Développeur Logiciels Web</p>

                                        <a class="block mt-4 text-2xl font-semibold text-gray-800 hover:underline">
                                            Alternance chez REQUEA - 2 ans
                                        </a>

                                        <p class="mt-3 text-sm text-gray-500 md:text-sm">
                                            Chez REQUEA, un éditeur de logiciels français spécialisé dans les plateformes de
                                            Cœur de Réseaux, j'ai eu le privilège de travailler en tant que développeur
                                            logiciel web dans le domaine de l'IoT. Notre entreprise œuvre depuis une
                                            décennie à fournir des solutions IoT...
                                        </p>

                                        <a onclick="showMoreExp('requea')"
                                            class="inline-block mt-2 text-blue-500 underline hover:text-blue-400 cursor-pointer">Lire
                                            plus</a>

                                        <div class="flex items-center mt-6">
                                            <img class="object-cover object-center h-10 rounded-xl"
                                                src="{{ 'portfolioFile/logo_requea.svg' }}" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-8 lg:-mx-6 lg:flex lg:items-center">
                                    <img class="object-cover w-full lg:mx-6 lg:w-1/2 rounded-xl h-72 lg:h-96"
                                        src="{{ 'portfolioFile/OIG22.jpeg' }}" alt="">

                                    <div class="mt-6 lg:w-1/2 lg:mt-0 lg:mx-6 ">
                                        <p class="text-sm text-blue-500 uppercase">Développeur c#.NET / Delphi</p>

                                        <a class="block mt-4 text-2xl font-semibold text-gray-800 hover:underline">
                                            Alternance chez OCTAFOOD - 1 an
                                        </a>

                                        <p class="mt-3 text-sm text-gray-500 md:text-sm">
                                            Chez OCTAFOOD, une entreprise spécialisée dans le développement de logiciels
                                            destinés au secteur de l'agroalimentaire, j'ai eu le privilège de travailler en
                                            tant que développeur C#.NET et Delphi. Mon rôle principal consistait à assurer
                                            la maintenance et l'améli...
                                        </p>

                                        <a onclick="showMoreExp('octafood')"
                                            class="inline-block mt-2 text-blue-500 underline hover:text-blue-400 cursor-pointer">Lire
                                            plus</a>

                                        <div class="flex items-center mt-6">
                                            <img class="object-cover object-center h-20 rounded-xl"
                                                src="{{ 'portfolioFile/logo-octafood-1-02.png' }}" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-8 lg:-mx-6 lg:flex lg:items-center">
                                    <img class="object-cover w-full lg:mx-6 lg:w-1/2 rounded-xl h-72 lg:h-96"
                                        src="{{ 'portfolioFile/OIG3.jpeg' }}" alt="">

                                    <div class="mt-6 lg:w-1/2 lg:mt-0 lg:mx-6 ">
                                        <p class="text-sm text-blue-500 uppercase">Développeur web</p>

                                        <a class="block mt-4 text-2xl font-semibold text-gray-800 hover:underline">
                                            Stage de fin d'études chez LEI - 3 mois
                                        </a>

                                        <p class="mt-3 text-sm text-gray-500 md:text-sm">
                                            En tant que développeur web chez LEI, j'ai eu l'opportunité de plonger
                                            directement dans le monde du développement web, même sans une connaissance
                                            préalable approfondie de ASP.NET et Angular 5, en travaillant sur un projet
                                            crucial de migration de fonctionnalités...
                                        </p>

                                        <a onclick="showMoreExp('lei')"
                                            class="inline-block mt-2 text-blue-500 underline hover:text-blue-400 cursor-pointer">Lire
                                            plus</a>

                                        <div class="flex items-center mt-6">
                                            <img class="object-cover object-center h-10 rounded-xl"
                                                src="{{ 'portfolioFile/LEI.png' }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div id="etud" class="flex rounded-lg min-h-screen hidden">
                        <section class="bg-white">
                            <div class="container px-6 py-10 mx-auto">
                                <div class="lg:flex lg:items-center">
                                    <div class="w-full space-y-12 lg:w-1/2 ">
                                        <div>
                                            <h1 class="text-2xl font-semibold text-gray-800 capitalize lg:text-3xl">Mes
                                                Études</h1>

                                            <div class="mt-2">
                                                <span class="inline-block w-40 h-1 bg-blue-500 rounded-full"></span>
                                                <span class="inline-block w-3 h-1 ml-1 bg-blue-500 rounded-full"></span>
                                                <span class="inline-block w-1 h-1 ml-1 bg-blue-500 rounded-full"></span>
                                            </div>
                                        </div>

                                        <div class="md:flex md:items-start md:-mx-4">
                                            <span class="inline-block p-2 text-blue-500 rounded-xl md:mx-4">
                                                <i class="fa-solid fa-graduation-cap fa-xl"></i>
                                            </span>

                                            <div class="mt-4 md:mx-4 md:mt-0">
                                                <h1 class="text-xl font-semibold text-gray-700 capitalize"> Master (RNCP 7)
                                                    - EXPERT
                                                    EN INGÉNIERIE INFORMATIQUE</h1>

                                                <p class="mt-3 text-gray-500">
                                                    AFIP Formations - Villeurbanne (69100)
                                                    <br> 2022 - 2024
                                                </p>
                                            </div>
                                        </div>

                                        <div class="md:flex md:items-start md:-mx-4">
                                            <span class="inline-block p-2 text-blue-500 rounded-xl md:mx-4">
                                                <i class="fa-solid fa-book fa-xl"></i>
                                            </span>

                                            <div class="mt-4 md:mx-4 md:mt-0">
                                                <h1 class="text-xl font-semibold text-gray-700 capitalize">Bachelor (RNCP
                                                    6) -
                                                    CONCEPTEUR DÉVELOPPEUR D'APPLICATIONS</h1>

                                                <p class="mt-3 text-gray-500">
                                                    AFIP Formations - Villeurbanne (69100)
                                                    <br> 2020 - 2021
                                                </p>
                                            </div>
                                        </div>

                                        <div class="md:flex md:items-start md:-mx-4">
                                            <span class="inline-block p-2 text-blue-500 rounded-xl md:mx-4">
                                                <i class="fa-solid fa-school fa-xl"></i>
                                            </span>

                                            <div class="mt-4 md:mx-4 md:mt-0">
                                                <h1 class="text-xl font-semibold text-gray-700 capitalize">Bts (RNCP 5) -
                                                    SERVICES
                                                    INFORMATIQUES AUX ORGANISATIONS (SIO)</h1>

                                                <p class="mt-3 text-gray-500">
                                                    Institution des Chartreux - Lyon (69)
                                                    <br> 2018 - 2020
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="hidden lg:flex lg:items-center lg:w-1/2 lg:justify-center">
                                        <img class="w-[28rem] h-[28rem] object-cover xl:w-[34rem] xl:h-[34rem] rounded-full"
                                            src="{{ asset('portfolioFile/OIG1.jpeg ') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div id="conta" class="flex rounded-lg min-h-screen hidden">
                        <section class="bg-white">
                            <div class="container px-6 py-12 mx-auto">
                                <div>
                                    <h1 class="mt-2 text-2xl font-semibold text-gray-800 md:text-3xl">Des questions
                                        ?</h1>

                                    <p class="font-medium text-blue-500">Me contacter</p>

                                    <p class="mt-3 text-gray-500">Contactez moi pour toute question ou commentaire.
                                        Je répondrai dès que possible.</p>
                                </div>

                                <div class="grid grid-cols-1 gap-12 mt-10 md:grid-cols-2 lg:grid-cols-3">
                                    <div>
                                        <span class="inline-block text-blue-500 rounded-full">
                                            <i class="fa-solid fa-envelope fa-xl"></i>
                                        </span>

                                        <h2 class="mt-4 text-lg font-medium text-gray-800">Email</h2>
                                        <p class="mt-2 text-gray-500">Un email est toujours le bienvenu.</p>
                                        <a href="mailto:hugopresle@outlook.fr " class="mt-2 text-blue-500">
                                            hugopresle@outlook.fr
                                        </a>
                                    </div>

                                    <div>
                                        <span class="inline-block text-blue-500 rounded-full">
                                            <i class="fa-brands fa-linkedin fa-xl"></i>
                                        </span>

                                        <h2 class="mt-4 text-lg font-medium text-gray-800">LinkedIn</h2>
                                        <p class="mt-2 text-gray-500">Envoyez moi un message sur LinkedIn.</p>
                                        <a href="https://www.linkedin.com/in/hugo-presle-7648191ab"
                                            class="mt-2 text-blue-500">Hugo Presle</a>
                                    </div>

                                    <div>
                                        <span class="inline-block text-blue-500 rounded-full">
                                            <i class="fa-solid fa-phone fa-xl"></i>
                                        </span>

                                        <h2 class="mt-4 text-lg font-medium text-gray-800">Téléphone</h2>
                                        <p class="mt-2 text-gray-500">Appelez moi directement.</p>
                                        <p class="mt-2 text-blue-500">06 28 98 87 51</p>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div id="readMoreExp" class="flex rounded-lg min-h-screen hidden">
                        <section class="bg-white">
                            <div class="container px-6 py-10 mx-auto">
                                <h1 class="text-2xl font-semibold text-gray-800 capitalize lg:text-3xl">
                                    <span id="RDM-type" class="text-blue-500"></span> - <span id="RDM-title"></span>
                                </h1>
                                <p class="text-gray-500" id="RDM-date">
                                </p>

                                <p class="mt-4 text-gray-500 xl:mt-6" id="RDM-text">
                                </p>

                                <h2
                                    class="mt-4 text-xl font-semibold text-gray-700 capitalize underline decoration-blue-500">
                                    technologies utilisées
                                </h2>
                                <p class="text-gray-500" id="RDM-tech">
                                </p>
                                <h2
                                    class="mt-6 text-xl font-semibold text-gray-700 capitalize underline decoration-blue-500">
                                    Compétences technique</h2>
                                <div class="grid grid-cols-1 gap-8 mt-4 xl:mt-6 xl:gap-12 md:grid-cols-1 xl:grid-cols-4"
                                    id="RDM-compeTe">
                                </div>
                                <h2
                                    class="mt-6 text-xl font-semibold text-gray-700 capitalize underline decoration-blue-500">
                                    Compétences fonctionnelles</h2>
                                <div class="grid grid-cols-1 gap-8 mt-4 xl:mt-6 xl:gap-12 md:grid-cols-1 xl:grid-cols-4"
                                    id="RDM-compeFo">
                                </div>
                                <div class="mt-4">
                                    <h1
                                        class="text-xl font-semibold text-gray-700 capitalize underline decoration-blue-500">
                                        Conclusion</h1>
                                    <p class="text-gray-500" id="RDM-conclu">
                                    </p>
                                </div>
                                <div class="mt-4">
                                    <a class="text-blue-500 hover:underline hover:decoration-blue-500 cursor-pointerm"
                                        id="RDM-back" onclick="portMenu('exp')">
                                        <i class="fa-solid fa-arrow-left"></i> Retour sur les expériences
                                    </a>

                                </div>
                            </div>
                        </section>
                    </div>
                    <div id="readMoreComp" class="flex rounded-lg min-h-screen hidden">
                        <section class="bg-white">
                            <div class="container px-6 py-10 mx-auto">
                                <h1 id="RMC-title"
                                    class="text-2xl font-semibold text-center text-gray-800 capitalize lg:text-3xl">
                                </h1>

                                <div class="flex justify-center mx-auto mt-6">
                                    <span class="inline-block w-40 h-1 bg-blue-500 rounded-full"></span>
                                    <span class="inline-block w-3 h-1 mx-1 bg-blue-500 rounded-full"></span>
                                    <span class="inline-block w-1 h-1 bg-blue-500 rounded-full"></span>
                                </div>

                                <div class="flex items-start max-w-6xl mx-auto">
                                    <div>
                                        <div class="flex flex-col items-center justify-center mt-8" id="RMC-icon"></div>
                                        <h2 class="mt-6 text-xl font-semibold text-gray-700">
                                            Définition :
                                        </h2>

                                        <p class="mt-4 text-gray-500">
                                            <span id="RMC-def"></span>
                                        </p>
                                        <h2 class="mt-6 text-xl font-semibold text-gray-700">
                                            Compétences :
                                        </h2>

                                        <p class="mt-4 text-gray-500">
                                            <span id="RMC-text"></span>
                                        </p>

                                        <h2 class="mt-6 text-xl font-semibold text-gray-700">
                                            Conclusion :
                                        </h2>
                                        <p class="mt-4 text-gray-500">
                                            <span id="RMC-conclu"></span>
                                        </p>
                                    </div>
                                </div>
                                <hr class="my-6 border-gray-200">
                                <h2 class="mt-6 text-xl font-semibold text-gray-700">
                                    Liste des projets en rapport avec cette
                                    <span class="underline decoration-blue-500">compétence</span> :
                                </h2>
                                <h3 class="mt-6 text-gray-700">Projet professionnel : </h3>
                                <p>
                                    <span class="inline-block w-40 h-1 bg-blue-500 rounded-full"></span>
                                    <span class="inline-block w-3 h-1 mx-1 bg-blue-500 rounded-full"></span>
                                    <span class="inline-block w-1 h-1 bg-blue-500 rounded-full"></span>
                                </p>
                                <ul id="RMC-proj" class="mt-4 text-gray-500"></ul>

                                <h3 class="mt-6 text-gray-700">Projet perso : </h3>
                                <p>
                                    <span class="inline-block w-40 h-1 bg-blue-500 rounded-full"></span>
                                    <span class="inline-block w-3 h-1 mx-1 bg-blue-500 rounded-full"></span>
                                    <span class="inline-block w-1 h-1 bg-blue-500 rounded-full"></span>
                                </p>
                                <ul id="RMC-projP" class="mt-4 text-gray-500"></ul>

                                <div class="mt-4">
                                    <a class="text-blue-500 hover:underline hover:decoration-blue-500 cursor-pointerm"
                                        id="RMC-back" onclick="portMenu('comp')">
                                        <i class="fa-solid fa-arrow-left"></i> Retour sur les compétences
                                    </a>

                                </div>
                            </div>
                        </section>
                    </div>
                    <div id="readMoreProj" class="flex rounded-lg min-h-screen hidden">
                        <section class="bg-white">
                            <div class="container px-6 py-10 mx-auto">
                                <div class="lg:flex lg:-mx-6">
                                    <div class="lg:w-3/4 lg:px-6">
                                        <img class="object-cover object-center w-full h-80 xl:h-[28rem] rounded-xl border border-gray-200"
                                            id="RMP-img" alt="">
                                        <div>
                                            <p class="mt-6 text-sm text-blue-500 uppercase" id="RMP-type"></p>

                                            <h1 class="max-w-lg mt-4 text-2xl font-semibold leading-tight text-gray-800"
                                                id="RMP-title">
                                            </h1>

                                            <div class="flex items-center mt-6">
                                                <p class="mt-1 text-gray-500" id="RMP-text"></p>
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <a class="text-blue-500 hover:underline hover:decoration-blue-500 cursor-pointerm"
                                                id="RDM-back" onclick="portMenu('proj')">
                                                <i class="fa-solid fa-arrow-left"></i> Retour aux projets
                                            </a>
                                        </div>
                                    </div>

                                    <div class="mt-8 lg:w-1/4 lg:mt-0 lg:px-6">
                                        <div>
                                            <h3 class="text-blue-500 capitalize">technologies utilisées</h3>
                                            <ul class="mt-2 text-gray-500" id="RMP-tech">
                                            </ul>
                                        </div>

                                        <hr class="my-6 border-gray-200">

                                        <div>
                                            <h3 class="text-blue-500 capitalize">competences</h3>
                                            <ul class="mt-2 text-gray-500" id="RMP-comp">
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
    </section>
@endsection

@section('scripts')
    <script>
        onload = () => {
            loadCompetencePage();
        }

        function portMenu(id) {
            let divs = document.querySelectorAll('#menu > div');
            divs.forEach(div => {
                if (div.id == id) {
                    div.classList.remove('hidden');
                    document.getElementById(`${id}A`).classList.add('selectedNav');
                    let iElement = document.getElementById(`${id}A`).querySelector('i');
                    iElement.classList.add('fa-beat');
                } else {
                    div.classList.add('hidden');
                    document.getElementById(`${div.id}A`).classList.remove('selectedNav');
                    let iElement = document.getElementById(`${div.id}A`).querySelector('i');
                    if (iElement != null) {
                        iElement.classList.remove('fa-beat');
                    }

                }
            });
        }

        function loadCompetencePage() {
            readJsonFile('/portfolioFile/data.json').then(data => {
                let div = document.getElementById('lstComp');
                json = data.competence;
                json.forEach(comp => {
                    comp.type == 'technique' ? color = 'blue' : color = 'stone';
                    const truncatedText = truncateText(comp.text, 150);
                    div.innerHTML += `
                        <div class="space-y-3 border-2 border-${color}-400 rounded-xl p-3">
                            <span class="inline-block p-3 text-${color}-500 rounded-full">
                                <i class="${comp.icon} fa-xl"></i>
                            </span>
                            <h1 class="text-xl font-semibold text-gray-700 capitalize">${comp.title}</h1>
                            <p class="text-gray-500">${truncatedText}</p>
                            <a
                                onclick="showMoreComp('${comp.id}')"
                                class="inline-flex items-center -mx-1 text-sm text-${color}-500 capitalize transition-colors duration-300 transform hover:underline hover:text-${color}-600">
                                <span class="mx-1">Lire plus <i class="fa-solid fa-arrow-right"></i> </span>
                            </a>
                        </div>`;
                });
            });
        }

        function showMoreComp(comp, backproj) {
            let divs = document.querySelectorAll('#menu > div');
            divs.forEach(div => {
                if (div.id == 'readMoreComp') {
                    div.classList.remove('hidden');
                    changeTextComp(comp, backproj);
                } else {
                    div.classList.add('hidden');
                }
            });

        }

        function changeTextComp(id, backproj) {
            clearComp();
            readJsonFile('/portfolioFile/data.json').then(data => {
                json = data.competence;
                json = json.find(comp => comp.id == id);

                let title = document.getElementById('RMC-title');
                let text = document.getElementById('RMC-text');
                let def = document.getElementById('RMC-def');
                let conclu = document.getElementById('RMC-conclu');
                let i = document.getElementById('RMC-icon');
                let a = document.getElementById('RMC-back');

                title.innerHTML = json.title;
                text.innerHTML = json.text;
                def.innerHTML = json.definition;
                conclu.innerHTML = json.conclusion;
                i.innerHTML = `<i class="rounded-full text-blue-500 ${json.icon} fa-3x"></i>`;
                let ul = document.getElementById('RMC-proj');
                json.projets.forEach(proj => {
                    ul.innerHTML += `<li class="mt-2 text-gray-500 uppercase hover:underline hover:text-blue-500 cursor-pointer"
                    onclick="showMoreExp('${proj}',${json.id})">
                        <span class="inline-block w-2 h-2 mr-2 bg-blue-500 rounded-full"></span>${proj}</li>`;
                });
                json.projetsPerso.forEach(proj => {
                    ul = document.getElementById('RMC-projP');
                    ul.innerHTML += `<li class="mt-2 text-gray-500 uppercase hover:underline hover:text-blue-500 cursor-pointer"
                    onclick="showProj('${proj}')">
                        <span class="inline-block w-2 h-2 mr-2 bg-blue-500 rounded-full"></span>${proj}</li>`;
                });
                if (backproj != null) {
                    a.innerHTML =
                        `<i class="fa-solid fa-arrow-left"></i> Retour sur <span class="capitalize">${backproj}</span>`;
                    a.onclick = () => {
                        showProj(backproj);
                    }
                } else {
                    a.innerHTML = `<i class="fa-solid fa-arrow-left"></i> Retour sur les compétences`;
                    a.onclick = () => {
                        portMenu('comp');
                    }
                }
            });
        }

        function clearComp() {
            let title = document.getElementById('RMC-title');
            let text = document.getElementById('RMC-text');
            let i = document.getElementById('RMC-icon');
            let a = document.getElementById('RMC-back');
            let ul = document.getElementById('RMC-proj');
            let ulP = document.getElementById('RMC-projP');

            title.innerHTML = '';
            text.innerHTML = '';
            i.innerHTML = '';
            ul.innerHTML = '';
            ulP.innerHTML = '';

        }

        function showMoreExp(proj, backcomp) {
            let divs = document.querySelectorAll('#menu > div');
            divs.forEach(div => {
                if (div.id == 'readMoreExp') {
                    div.classList.remove('hidden');
                    changeTextexp(proj, backcomp);
                } else {
                    div.classList.add('hidden');
                }
            });

        }

        function changeTextexp(proj, backcomp) {
            clearExp();
            readJsonFile('/portfolioFile/data.json').then(data => {
                let competences = data.competence;
                let competence = competences.find(comp => comp.id == backcomp);
                json = data.experiences[proj];

                let type = document.getElementById('RDM-type');
                let title = document.getElementById('RDM-title');
                let date = document.getElementById('RDM-date');
                let text = document.getElementById('RDM-text');
                let techn = document.getElementById('RDM-tech');
                let compeTe = document.getElementById('RDM-compeTe');
                let compeFo = document.getElementById('RDM-compeFo');
                let conclu = document.getElementById('RDM-conclu');
                let a = document.getElementById('RDM-back');


                type.innerHTML = json.type;
                title.innerHTML = json.title;
                date.innerHTML = json.date;
                text.innerHTML = json.text;
                conclu.innerHTML = json.conclusion;
                json.technologies.forEach(tech => {
                    techn.innerHTML +=
                        `<span class="">${tech}, </span>`;
                });

                json.competences.forEach(compet => {
                    const truncatedText = truncateText(compet.text, 150);
                    compeTe.innerHTML += `
                        <div class="space-y-3 border-2 border-blue-400 rounded-xl p-3">
                            <span class="inline-block p-3 text-blue-500 rounded-full">
                                <i class="${compet.icon} fa-xl"></i>
                            </span>
                            <h1 class="text-xl font-semibold text-gray-700 capitalize">${compet.title}</h1>
                            <p class="text-gray-500">${truncatedText}</p>
                            <a href="#"
                                class="inline-flex items-center -mx-1 text-sm text-blue-500 capitalize transition-colors duration-300 transform hover:underline hover:text-blue-600">
                                <span class="mx-1" onclick="showMoreComp('${compet.id}')">Lire plus <i class="fa-solid fa-arrow-right"></i> </span>
                            </a>
                        </div>`;
                });
                json.competencesFonctionelle.forEach(compet => {
                    const truncatedText = truncateText(compet.text, 150);
                    compeFo.innerHTML += `
                        <div class="space-y-3 border-2 border-blue-400 rounded-xl p-3">
                            <span class="inline-block p-3 text-blue-500 rounded-full">
                                <i class="${compet.icon} fa-xl"></i>
                            </span>
                            <h1 class="text-xl font-semibold text-gray-700 capitalize">${compet.title}</h1>
                            <p class="text-gray-500">${truncatedText}</p>
                            <a href="#"
                                class="inline-flex items-center -mx-1 text-sm text-blue-500 capitalize transition-colors duration-300 transform hover:underline hover:text-blue-600">
                                <span class="mx-1" onclick="showMoreComp('${compet.id}')">Lire plus <i class="fa-solid fa-arrow-right"></i> </span>
                            </a>
                        </div>`;
                });

                a.onclick = () => {
                    showMoreComp(backcomp);
                }
                a.innerHTML = `<i class="fa-solid fa-arrow-left"></i> Retour sur ${competence.title}`;
            });
        }

        function clearExp() {
            let type = document.getElementById('RDM-type');
            let title = document.getElementById('RDM-title');
            let date = document.getElementById('RDM-date');
            let text = document.getElementById('RDM-text');
            let techn = document.getElementById('RDM-tech');
            let compeTe = document.getElementById('RDM-compeTe');
            let compeFo = document.getElementById('RDM-compeFo');
            let conclu = document.getElementById('RDM-conclu');

            type.innerHTML = '';
            title.innerHTML = '';
            date.innerHTML = '';
            text.innerHTML = '';
            techn.innerHTML = '';
            compeTe.innerHTML = '';
            compeFo.innerHTML = '';
            conclu.innerHTML = '';
        }

        function showProj(proj) {
            let divs = document.querySelectorAll('#menu > div');
            divs.forEach(div => {
                if (div.id == 'readMoreProj') {
                    div.classList.remove('hidden');
                    changeTextProj(proj);
                } else {
                    div.classList.add('hidden');
                }
            });
        }

        function changeTextProj(proj) {
            clearProj();
            readJsonFile('/portfolioFile/data.json').then(data => {
                json = data.projets[proj];

                let type = document.getElementById('RMP-type');
                let title = document.getElementById('RMP-title');
                let text = document.getElementById('RMP-text');
                let ul = document.getElementById('RMP-tech');
                let comp = document.getElementById('RMP-comp');
                let image = document.getElementById('RMP-img');

                image.src = `portfolioFile/proj/${json.image}`;
                type.innerHTML = json.date;
                title.innerHTML = json.title;
                text.innerHTML = json.text;
                json.technologies.forEach(tech => {
                    ul.innerHTML += `<li class="mt-2 text-gray-500 uppercase">
                        <span class="inline-block w-2 h-2 mr-2 bg-gray-500 rounded-full"></span>${tech}</li>`;
                });
                json.competence.forEach(compe => {
                    comp.innerHTML += `<li class="mt-2 text-gray-500 uppercase hover:underline hover:text-blue-500 cursor-pointer"
                    onclick="showMoreComp('${compe.id}','${proj}')">
                        <span class="inline-block w-2 h-2 mr-2 bg-blue-500 rounded-full"></span>${compe.title}</li>`;
                });
            });
        }

        function clearProj() {
            let type = document.getElementById('RMP-type');
            let title = document.getElementById('RMP-title');
            let text = document.getElementById('RMP-text');
            let tech = document.getElementById('RMP-tech');
            let comp = document.getElementById('RMP-comp');
            let image = document.getElementById('RMP-img');


            type.innerHTML = '';
            title.innerHTML = '';
            text.innerHTML = '';
            tech.innerHTML = '';
            comp.innerHTML = '';

        }

        async function readJsonFile(filePath) {
            try {
                const response = await fetch(filePath);
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                const data = await response.json();
                return data;
            } catch (error) {
                console.error('Error reading or parsing JSON file:', error);
            }
        }

        function truncateText(text, limit) {
            return text.length > limit ? text.substring(0, limit) + '...' : text;
        }
    </script>
@endsection

<style>
    .selectedNav {
        background-color: #007BFF;
        /* Couleur de fond bleue */
        color: white !important;
        /* Couleur du text blanche */
        padding: 10px 20px;
        /* Espacement interne */
        border-radius: 4px;
        /* Coins arrondis */
        font-weight: bold;
        /* Texte en gras */
        transition: background-color 0.3s ease, color 0.3s ease;
        /* Transition en douceur lors du changement de couleur de fond et de text */
    }

    .selectedNav:hover {
        background-color: #015dc1;
        /* Couleur de fond bleu foncé lors du survol */
        color: #ddd;
        /* Couleur du text gris clair lors du survol */
    }
</style>
