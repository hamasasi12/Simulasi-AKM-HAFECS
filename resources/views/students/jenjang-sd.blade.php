<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=i, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>sd</p>

    <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit"
                                                class="flex items-center w-full text-left px-4 py-2 text-sm text-red-400 font-medium hover:bg-gray-100"
                                                role="menuitem">
                                                <i class="fa-solid fa-right-from-bracket mr-2 text-red-500"></i>
                                                Log Out
                                            </button>
                                        </form>
</body>
</html>