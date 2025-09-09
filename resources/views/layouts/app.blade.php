<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Kerala Lottery</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body class="bg-gray-100 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-indigo-600 text-white px-6 py-3 flex justify-between">
        <div class="flex justify-center mb-4">
            <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="h-16 w-auto">
        </div>

        <div class="space-x-6">
            <a href="{{ route('customer.home') }}" class="hover:underline">Home</a>
            <a href="{{ route('customer.ad') }}" class="hover:underline">Account Details</a>
        </div>
        <a href="mailto:info@keralalottery-result.org" class="flex items-centerr space-x-2 hover:underline textt-blue-600">
            <!-- Envelope Icon SVG -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-6 textt-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m0 8H3a2 2 0 01-2-2V6a2 2 0 012-2h18a2 2 0 012 2v8a2 2 0 01-2 2z" />
            </svg>
            <span>info@keralalottery-result.org</span>
        </a>





    </nav>

    <main class="p-6">
        @yield('content')
    </main>







    <div class="max-w-6xl mx-auto bg-white shadow-2xl rounded-xl p-8 mt-5">
        <!-- Include reusable prize card/table -->
        @include('components.table', [
        'title' => 'ðŸŽ‰ Bumper Prize ðŸŽ‰',
        'amount' => 'â‚¹ 1 Cr',
        'tickets' => [],
        'bg' => 'yellow-100',
        'color' => 'red-600'
        ])
        @include('components.table', [
        'title' => '1st Prize',
        'amount' => 'â‚¹ 50 Lacs',
        'tickets' => [],
        'bg' => 'yellow-100',
        'color' => 'blue-600'
        ])
        @include('components.table', [
        'title' => '2nd Prize',
        'amount' => 'â‚¹ 25 Lacs',
        'tickets' => [],
        'bg' => 'yellow-100',
        'color' => 'blue-600'
        ])
        @include('components.table', [
        'title' => '3rd Prize',
        'amount' => 'â‚¹ 12 Lacs',
        'tickets' => ["KL702037","KL710346","PF744802","KL544630","KL871027","KL906238",
        "KL626495","KL902355","KL368029","KL373525","KL673222","KL715200",
        "KL882845","KL793838","KL373844","KL374444","KL709728","KL784627",
        "KL403545","KL907234","KL628247","KL735590","KL675295","KL762525",
        "KL807234","KL539307","KL464376","KL306253","TA112350","KL723664",
        "KL788566","KL424488","KL702358","KL767835","KL742352","KL716523",
        "OV360096","KL566234","KL448827","KL383248","KL507639"],
        'bg' => 'yellow-100',
        'color' => 'blue-600'
        ])
        @include('components.table', [
        'title' => '4th Prize',
        'amount' => 'â‚¹ 8 Lacs',
        'tickets' => ["KL997722", "KL782656", "KL424478", "KL889278"],
        'bg' => 'yellow-100',
        'color' => 'blue-600'
        ])

        @include('components.table', [
        'title' => 'Consolidated Prize',
        'amount' => 'â‚¹ 5,000 â€“ â‚¹ 8 Lacs',
        'tickets' => [
        "KL877849","KL906486","KL554933","KL09779","KL17379","KL73394","KL723715",
        "KL748526","KL365410","KL308651","KL608522","KL72777","KL361227","KL234837",
        "SK078960","KL506724","KL499521","KL23487","KL442935","KL303088","KL369262",
        "KL507259","KL602584","KL224052","KL370131","KL735428","KL353518","KL807235",
        "KL423804","KL763574","KL863360","KL233667","KL304726","KL248918","KL171371",
        "KL772989","KL949345","KL503602","KL485322","KL204763","KL725805","KL440494",
        "KL203020","KL702948","KL722153","KL436411","KL868677","KL447769","KL336655",
        "KL556677","KL776296","KL888996","KL659026","KL032315","KL032315","KL675249",
        "KL534444","KL774267","KL222211","KL171371","KL912802","KL534444","KL212138",
        "KL105955","KL403452","KL436842","KL313252","KL698532","KL305412","KL787588",
        "KL480423","KL725225","KL303868","KL303845","KL871020","KL379249","KL300414",
        "KL702022","KL126972","KL787298","KL552233","KL828529","KL222200","KL623345",
        "KL963321","KL926345","KL552233","KL454420","KL221421","KL202425","KL283069",
        "KL463760","KL662544","KL205362","KL367888","KL634791","KL667722","KL351246",
        "KL010365","KL085423","KL868677","KL089451","KL692025","KL692025","KL506035",
        "KL121169","KL552255","KL723647","KL758025","KL768524","KL75217","KL702235",
        "KL652862","KL525288","KL754422","KL663377","KL702211","KL704233","KL695424",
        "KL22211","KL601244","KL161202","KL304629","KL485215","KL932334","KL554640",
        "KL467042","KL721456","KL340821","KL336611","KL340821","KL983245","KL141441",
        "KL455282"
        ],
        'bg' => 'blue-100',
        'color' => 'blue-600'
        ])
    </div>


    <!--    <section class="py-12 bg-gray-100">-->
    <!--  <div class="max-w-6xl mx-auto px-4">-->
    <!--    <h2 class="text-3xl font-bold text-center mb-8">Contact Us</h2>-->

    <!--    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">-->

    <!-- Address Box -->
    <!--      <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col items-center text-center">-->
    <!--        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mb-4 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">-->
    <!--          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13 21.314l-4.657-4.657A8 8 0 1117.657 16.657z" />-->
    <!--        </svg>-->
    <!--        <h3 class="font-semibold text-lg mb-2">Address</h3>-->
    <!--        <p class="text-gray-600 text-sm sm:text-base">123 Kerala Lottery Street,<br>Thiruvananthapuram, Kerala, India</p>-->
    <!--      </div>-->

    <!-- Mobile Box -->
    <!--      <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col items-center text-center">-->
    <!--        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mb-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">-->
    <!--          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5.25a2.25 2.25 0 012.25-2.25h2.25c.621 0 1.145.348 1.457.875l1.518 2.276a1.5 1.5 0 01-.17 1.94l-1.518 1.518a11.042 11.042 0 005.516 5.516l1.518-1.518a1.5 1.5 0 011.94-.17l2.276 1.518c.527.312.875.836.875 1.457v2.25A2.25 2.25 0 0118.75 21H18a16.5 16.5 0 01-15-15v-.75z"/>-->
    <!--        </svg>-->
    <!--        <h3 class="font-semibold text-lg mb-2">Mobile</h3>-->
    <!--        <p class="text-gray-600 text-sm sm:text-base">-->
    <!--          <a href="tel:{{ appSettings()?->helpline_number }}" class="text-blue-600 hover:underline">{{ appSettings()?->helpline_number }}</a>-->
    <!--        </p>-->
    <!--      </div>-->

    <!-- Email Box -->
    <!--      <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col items-center text-center">-->
    <!--        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mb-4 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">-->
    <!--          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m0 8H3a2 2 0 01-2-2V6a2 2 0 012-2h18a2 2 0 012 2v8a2 2 0 01-2 2z"/>-->
    <!--        </svg>-->
    <!--        <h3 class="font-semibold text-lg mb-2">Email</h3>-->
    <!--        <a href="mailto:info@keralalottery-result.org" class="text-blue-600 hover:underline text-sm sm:text-base">info@keralalottery-result.org</a>-->
    <!--      </div>-->

    <!--    </div>-->
    <!--  </div>-->
    <!--</section>-->

    <!--<section class="py-12 bbg-gray-100">-->
    <!--  <div class="max-w-6xl mx-auto px-4">-->
    <!--    <h2 class="text-3xl font-bold text-center mb-8">Contact Us</h2>-->

    <!--    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">-->

    <!-- Address Box -->
    <!--      <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col items-center text-center">-->
    <!--        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mb-3 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">-->
    <!--          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13 21.314l-4.657-4.657A8 8 0 1117.657 16.657z" />-->
    <!--        </svg>-->
    <!--        <h3 class="font-semibold text-lg mb-2">Address</h3>-->
    <!--        <p class="text-gray-600">123 Kerala Lottery Street,<br>Thiruvananthapuram, Kerala, India</p>-->
    <!--      </div>-->

    <!-- Mobile Box -->
    <!--      <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col items-center text-center">-->
    <!--        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mb-2 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">-->
    <!--          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5.25a2.25 2.25 0 012.25-2.25h2.25c.621 0 1.145.348 1.457.875l1.518 2.276a1.5 1.5 0 01-.17 1.94l-1.518 1.518a11.042 11.042 0 005.516 5.516l1.518-1.518a1.5 1.5 0 011.94-.17l2.276 1.518c.527.312.875.836.875 1.457v2.25A2.25 2.25 0 0118.75 21H18a16.5 16.5 0 01-15-15v-.75z"/>-->
    <!--        </svg>-->
    <!--        <h3 class="font-semibold text-lg mb-2">Mobile</h3>-->
    <!--        <p class="text-gray-600"><a href="tel:{{ appSettings()?->helpline_number }}" class="text-blue-600 hover:underline">{{ appSettings()?->helpline_number }}</a></p>-->
    <!--      </div>-->

    <!-- Email Box -->
    <!--      <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col items-center text-center">-->
    <!--        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mb-3 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">-->
    <!--          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m0 8H3a2 2 0 01-2-2V6a2 2 0 012-2h18a2 2 0 012 2v8a2 2 0 01-2 2z"/>-->
    <!--        </svg>-->
    <!--        <h3 class="font-semibold text-lg mb-2">Email</h3>-->
    <!--        <a href="mailto:info@keralalottery-result.org" class="text-blue-600 hover:underline">info@keralalottery-result.org</a>-->
    <!--      </div>-->

    <!--    </div>-->
    <!--  </div>-->
    <!--</section>-->
    <!-- Footer -->
    <footer class="bg-indigo-600 text-white text-center py-3 mt-3">
        <p class="text-sm">&copy; {{ date('Y') }} Kerala Lottery. All rights reserved.</p>
        <!-- <p class="text-xs">Designed & Developed by <span class="font-semibold">YourCompany</span></p> -->
    </footer>
</body>

</html>