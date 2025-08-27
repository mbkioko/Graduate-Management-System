<x-layout>
    <div class="mx-4">
        <x-card class="p-10 rounded max-w-lg mx-auto mt-24"        >
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Two Factor Authentication
                </h2>
                <p class="mb-6">Enter OTP sent to your email</p>
            </header>

            <form action="{{ url('verify-registration-otp') }}" method="POST">
                @csrf
                <label for="email" class="inline-block text-lg mb-2">Enter Your code:</label>
                <input type="number" class="border border-gray-200 rounded p-2 w-full" id="otp" name="otp" required>
        
                <div class="mb-6">
                    <button
                        type="submit"
                        class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                    >
                        Submit
                    </button>
                    <a href="{{ route('resend.regotp') }}" class="text-blue-500 hover:text-blue-700">Resend OTP</a>
                </div>
            </form>
            </form>
        </div>
    </x-card>
</x-layout>
