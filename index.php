<?php
require_once 'class.php';

$ticketObj = new Conn();
$ticketId = isset($_GET['ticket_id']) ? $_GET['ticket_id'] : null;
// echo $ticketId;
$ticketData = $ticketObj->selectData('tickets', '*', $ticketId);

if ($ticketData) {
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">
    <!-- component -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>
    <title>support </title>

</head>

<body>

    <section class="bg-indigo-500 dark:bg-gray-800 font-poppins">
        <div class="max-w-6xl px-4 mx-auto" x-data="{open:false}">
            <nav class="flex items-center justify-between py-3">
                <a href="index.php"><img src="img/logo H.T.S.png" alt="" class="h-10 w-28"></a>
                <div class="lg:hidden">
                    <button
                        class="flex items-center px-3 py-2 text-blue-200 border border-blue-200 rounded dark:text-gray-400 hover:text-blue-300 hover:border-blue-300 lg:hidden"
                        @click="open =true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-list" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                        </svg>
                    </button>
                </div>
                <ul class="hidden lg:w-auto lg:space-x-12 lg:items-center lg:flex ">
                    <li><a href="index.php"
                            class="text-sm text-gray-200 dark:text-gray-300 hover:text-blue-200 dark:hover:text-blue-200">Home</a>
                    </li>
                    <li><a href="support.php"
                            class="text-sm text-gray-200 dark:text-gray-300 hover:text-blue-200 dark:hover:text-blue-200">Support</a>
                    </li>
                    <li><a href=""
                            class="text-sm text-gray-200 dark:text-gray-300 hover:text-blue-200 dark:hover:text-blue-200">About</a>
                    </li>
                    <li><a href=""
                            class="text-sm text-gray-200 dark:text-gray-300 hover:text-blue-200 dark:hover:text-blue-200"></a>
                    </li>

                </ul>
                <div class="hidden lg:block">
                    <a href=""
                        class="inline-block px-4 py-3 mr-2 text-xs font-medium leading-none text-gray-100 border border-gray-200 rounded-full dark:text-gray-300 dark:border-gray-400 hover:bg-blue-200 dark:hover:text-gray-700 hover:text-gray-700">
                        Profil
                    </a>
                </div>

            </nav>
            <!-- Mobile Sidebar -->
            <div class="absolute inset-0 z-10 h-screen p-3 text-gray-700 duration-500 transform shadow-md dark:bg-gray-800 bg-blue-50 w-80 lg:hidden lg:transform-none lg:relative"
                :class="{'translate-x-0 ease-in-opacity-100' :open===true, '-translate-x-full ease-out opacity-0' : open===false}">
                <div class="flex justify-between px-5 py-2">
                <a href="index.php"><img src="img/logo H.T.S.png" alt="" class="h-10 w-28"></a>
                    <button class="rounded-md hover:text-blue-300 lg:hidden dark:text-gray-400" @click="open=false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-x-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path
                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </button>
                </div>
                <ul class="px-5 text-left mt-7">
                    <li class="pb-3">
                        <a href="index.php"
                            class="text-sm text-gray-700 hover:text-blue-400 dark:text-gray-400">home</a>
                    </li>
                    <li class="pb-3">
                        <a href="support.php"
                            class="text-sm text-gray-700 hover:text-blue-400 dark:text-gray-400">support</a>
                    </li>
                    <li class="pb-3">
                        <a href="" class="text-sm text-gray-700 hover:text-blue-400 dark:text-gray-400">About us</a>
                    </li>
                    <li class="pb-3">
                        <a href="" class="text-sm text-gray-700 hover:text-blue-400 dark:text-gray-400"></a>
                    </li>

                </ul>
                <div class="flex items-center mt-5 lg:hidden">
                    <a href=""
                        class="inline-block w-full px-4 py-3 mr-2 text-xs font-medium leading-none text-center text-gray-100 bg-blue-800 rounded-full dark:bg-blue-400 dark:text-gray-700 dark:border-gray-400 hover:bg-blue-200 dark:hover:text-gray-700 hover:text-gray-700">
                        Profil
                    </a>
                </div>

            </div>
        </div>
    </section> <!----------------------------------end navbar------------------------->
                <?php foreach ($ticketData as $ticket): ?>
                <div class="mb-4"></div>
                
                <div class='flex items-center justify-center '>
                    <div class="rounded-xl border p-5 shadow-md w-9/12 bg-white">
                        <div class="flex w-full items-center justify-between border-b pb-3">
                            <div class="flex items-center space-x-3">
                                <div class="h-8 w-8 rounded-full bg-slate-400 ">
                                    <img src="img/profil.png" alt="profil">
                                </div>
                                <div class="text-lg font-bold text-slate-700">
                                    <?= $ticket['developpeur'] ?>
                                </div>
                            </div>
                            <div class="flex items-center space-x-8">
                                <button
                                    class="rounded-2xl border bg-neutral-100 px-3 py-1 text-xs font-semibold"><?= $ticket['status'] ?></button>
                                <div class="text-xs text-neutral-500">
                                    <?= $ticket['Date'] ?>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 mb-6">
                            <div class="mb-3 text-xl font-bold">
                                <?= $ticket['titre'] ?>
                            </div>
                            <div class="text-sm text-neutral-600">
                                <?= $ticket['description'] ?>
                            </div>
                        </div>

                        <div>
                            <div class="flex items-center justify-between text-slate-500">
                                <div class="flex space-x-4 md:space-x-8">
                                    <div class="flex cursor-pointer items-center transition hover:text-slate-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-1.5 h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                        </svg>
                                        <span>125</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-4"></div>
                <?php endforeach; ?>

                <!--  -->


                </div>
            </div>
    </body>

    </html>
    <?php
} else {
    // Handle the case where the ticket data is not found
    echo 'Ticket not found.';
}
?>