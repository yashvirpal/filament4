<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Customer Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
        <!-- Logo -->
        <div class="flex justify-center mb-4">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-16 w-auto">
        </div>

        <h2 class="text-2xl font-bold text-center text-gray-800">
            🎟️ Customer Login
        </h2>
        <p class="text-center text-gray-500 mt-1 mb-6 text-sm">
            Login with your registered mobile number and ticket number
        </p>

        <!-- Alert box -->
        <div id="alert-box" class="hidden mb-4 text-sm text-center rounded p-2"></div>

        <form id="customer-login-form" class="space-y-4">
            @csrf

            <!-- Mobile Number -->
            <div>
                <label for="mobile" class="block text-sm font-medium text-gray-700">Mobile Number</label>
                <div class="relative mt-1">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <i class="fa-solid fa-phone"></i>
                    </span>
                    <input type="text" name="mobile" id="mobile" required
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-xl shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>
            </div>

            <!-- Ticket Number -->
            <div>
                <label for="ticket_no" class="block text-sm font-medium text-gray-700">Ticket Number</label>
                <div class="relative mt-1">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <i class="fa-solid fa-ticket"></i>
                    </span>
                    <input type="text" name="ticket_no" id="ticket_no" required
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-xl shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>
            </div>

            <button type="submit"
                class="btnsubmit w-full bg-indigo-600 text-white rounded-xl py-2 font-semibold hover:bg-indigo-700 transition">
                Login
            </button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('#customer-login-form').on('submit', function(e) {
                e.preventDefault();

                let formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('customer.login.submit') }}",
                    method: "POST",
                    data: formData,
                    beforeSend:function(){
                        $(".btnsubmit").text('wait...');
                        $(".btnsubmit").css('opacity',0.5);
                        $(".btnsubmit").attr('disabled',true);

                    },
                    success: function(response) {
                        $(".btnsubmit").text('Login');
                        $(".btnsubmit").css('opacity',1.0);
                        $(".btnsubmit").attr('disabled',false);
                        $('#alert-box')
                            .removeClass('hidden bg-red-100 text-red-600 border-red-300')
                            .addClass('bg-green-100 text-green-700 border-green-300')
                            .text(response.message)
                            .show();

                        setTimeout(() => {
                            window.location.href = response.redirect;
                        }, 1000);
                    },
                    error: function(xhr) {
                        $(".btnsubmit").text('Login');
                        $(".btnsubmit").css('opacity',1.0);
                        $(".btnsubmit").attr('disabled',false);
                        let errorMsg = xhr.responseJSON?.message || "Login failed!";
                        $('#alert-box')
                            .removeClass('hidden bg-green-100 text-green-700 border-green-300')
                            .addClass('bg-red-100 text-red-600 border-red-300')
                            .text(errorMsg)
                            .show();
                    }
                });
            });
        });
    </script>

</body>

</html>