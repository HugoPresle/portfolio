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
                            <span class="ms-3"><i class="fa-solid fa-folder-open fa-lg mr-3"></i>Projets</span>
                        </a>
                    </li>
                    <li>
                        <a onclick="portMenu('exp')" id="expA"
                            class="flex items-center p-2 cursor-pointer rounded-lg text-gray-800 hover:text-blue-500">
                            <span class="ms-3"><i class="fa-solid fa-briefcase fa-lg mr-3"></i>Experiences</span>
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
                    </li>

                </ul>
                <div id="dropdown-cta" class="p-4 mt-6 rounded-lg bg-blue-50" role="alert">
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
                </div>
            </div>
        </aside>

        <div class="p-4 sm:ml-64">
            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg">
                <div class="flex-1 mt-8 lg:mx-12 lg:mt-0" id="menu">
                    <div id="home" class="flex rounded-lg min-h-screen hidden">
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
                                            src="https://images.unsplash.com/photo-1488508872907-592763824245?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"
                                            alt="client photo" />

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
                    <div id="proj" class="flex rounded-lg min-h-screen">
                        <section class="bg-white">
                            <div class="container px-6 py-10 mx-auto">
                                <h1 class="text-2xl font-semibold text-gray-800 capitalize lg:text-3xl">
                                    <span class="underline decoration-blue-500">Projets</span>
                                </h1>
                                <p class="mt-4 text-gray-500 xl:mt-6">
                                    Liste de mes projets personnels et professionnels. Vous trouverez ici une sélection de mes projets les plus récents et les plus significatifs. N'hésitez pas à cliquer sur les images pour en savoir plus sur chaque projet.
                                </p>

                                <div class="grid grid-cols-1 gap-8 mt-8 xl:mt-12 xl:gap-12 md:grid-cols-1 xl:grid-cols-3">
                                    <div class="relative group">
                                        <img class="object-cover w-full rounded-lg h-96"
                                            src="https://images.unsplash.com/photo-1621111848501-8d3634f82336?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1565&q=80"
                                            alt="">
                                        <div
                                            class="rounded-lg absolute inset-0 flex flex-col justify-center items-center bg-gray-800/60 bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                            <h2 class="mt-4 text-xl font-semibold text-white capitalize">Best website
                                                collections</h2>
                                            <p class="mt-2 text-lg tracking-wider text-blue-400 uppercase">Website</p>
                                        </div>
                                    </div>
                                    <div class="relative group">
                                        <img class="object-cover w-full rounded-lg h-96"
                                            src="https://images.unsplash.com/photo-1621111848501-8d3634f82336?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1565&q=80"
                                            alt="">
                                        <div
                                            class="rounded-lg absolute inset-0 flex flex-col justify-center items-center bg-gray-800/60 bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                            <h2 class="mt-4 text-xl font-semibold text-white capitalize">Best website
                                                collections</h2>
                                            <p class="mt-2 text-lg tracking-wider text-blue-400 uppercase">Website</p>
                                        </div>
                                    </div>
                                    <div class="relative group">
                                        <img class="rounded-lg object-cover w-full rounded-lg h-96"
                                            src="https://images.unsplash.com/photo-1621111848501-8d3634f82336?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1565&q=80"
                                            alt="">
                                        <div
                                            class="absolute inset-0 flex flex-col justify-center items-center bg-gray-800/60 bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                            <h2 class="mt-4 text-xl font-semibold text-white capitalize">Best website
                                                collections</h2>
                                            <p class="mt-2 text-lg tracking-wider text-blue-400 uppercase">Website</p>
                                        </div>
                                    </div>
                                    <div class="relative group">
                                        <img class="object-cover w-full rounded-lg h-96"
                                            src="https://images.unsplash.com/photo-1621111848501-8d3634f82336?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1565&q=80"
                                            alt="">
                                        <div
                                            class="rounded-lg absolute inset-0 flex flex-col justify-center items-center bg-gray-800/60 bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                            <h2 class="mt-4 text-xl font-semibold text-white capitalize">Best website
                                                collections</h2>
                                            <p class="mt-2 text-lg tracking-wider text-blue-400 uppercase">Website</p>
                                        </div>
                                    </div>
                                    <div class="relative group">
                                        <img class="object-cover w-full rounded-lg h-96"
                                            src="https://images.unsplash.com/photo-1621111848501-8d3634f82336?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1565&q=80"
                                            alt="">
                                        <div
                                            class="rounded-lg absolute inset-0 flex flex-col justify-center items-center bg-gray-800/60 bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                            <h2 class="mt-4 text-xl font-semibold text-white capitalize">Best website
                                                collections</h2>
                                            <p class="mt-2 text-lg tracking-wider text-blue-400 uppercase">Website</p>
                                        </div>
                                    </div>
                                    <div class="relative group">
                                        <img class="rounded-lg object-cover w-full rounded-lg h-96"
                                            src="https://images.unsplash.com/photo-1621111848501-8d3634f82336?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1565&q=80"
                                            alt="">
                                        <div
                                            class="absolute inset-0 flex flex-col justify-center items-center bg-gray-800/60 bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                            <h2 class="mt-4 text-xl font-semibold text-white capitalize">Best website
                                                collections</h2>
                                            <p class="mt-2 text-lg tracking-wider text-blue-400 uppercase">Website</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div id="exp" class="flex rounded-lg min-h-screen hidden">
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
                                                    AFIP Formations - Lyon (69)
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
                                                    AFIP Formations - Lyon (69)
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

                                        <h2 class="mt-4 text-lg font-medium text-gray-800">Linkedin</h2>
                                        <p class="mt-2 text-gray-500">Envoyez moi un message sur Linkedin.</p>
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
                                    technologies</h2>
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
                                        <p class="mt-4 text-gray-500">
                                            <span id="RMC-text"></span>
                                        </p>
                                    </div>
                                </div>
                                <h2 class="mt-6 text-xl font-semibold text-gray-700">
                                    Liste des projets en rapport avec cette
                                    <span class="underline decoration-blue-500">compétence</span> :
                                </h2>
                                <ul id="RMC-proj" class="mt-4 text-gray-500"></ul>

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
                        </section>
                    </div>
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

        function showMoreComp(comp) {
            let divs = document.querySelectorAll('#menu > div');
            divs.forEach(div => {
                if (div.id == 'readMoreComp') {
                    div.classList.remove('hidden');
                    changeTextComp(comp);
                } else {
                    div.classList.add('hidden');
                }
            });

        }

        function changeTextComp(id) {
            clearComp();
            readJsonFile('/portfolioFile/data.json').then(data => {
                json = data.competence;
                json = json.find(comp => comp.id == id);

                let title = document.getElementById('RMC-title');
                let text = document.getElementById('RMC-text');
                let i = document.getElementById('RMC-icon');

                title.innerHTML = json.title;
                text.innerHTML = json.text;
                i.innerHTML = `<i class="rounded-full text-blue-500 ${json.icon} fa-3x"></i>`;
                let ul = document.getElementById('RMC-proj');
                json.projets.forEach(proj => {
                    ul.innerHTML += `<li class="mt-2 text-gray-500 uppercase hover:underline hover:text-blue-500 cursor-pointer"
                    onclick="showMoreExp('${proj}',${json.id})">
                        <span class="inline-block w-2 h-2 mr-2 bg-blue-500 rounded-full"></span>${proj}</li>`;
                });

            });
        }

        function clearComp() {
            let title = document.getElementById('RMC-title');
            let text = document.getElementById('RMC-text');
            let i = document.getElementById('RMC-icon');

            title.innerHTML = '';
            text.innerHTML = '';
            i.innerHTML = '';
            let ul = document.getElementById('RMC-proj');
            ul.innerHTML = '';

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
                        `<span class="hover:underline hover:text-blue-500 cursor-pointer">${tech}, </span>`;
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
