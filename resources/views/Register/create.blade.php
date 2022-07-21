@extends('layout')
@section('content')
    <h1 align="center">Registration Form</h1>
    <form method="POST" action="/register" align="center" class="create">
        @csrf
            <table align="center" cellpadding="5">
                <tbody>
                <tr>
                    <td class="right">
                        <label for="name">
                            Name:
                        </label>
                    </td>
                    <td class="left">
                        <input type="text"
                    name="name"
                    id="name"
                    value="{{old('name')}}"
                    required
                        >
                        <!--JS ERROR MESSAGE-->
                        <p  class="perror error" id="name-error">
                            Please provide a name between 0-255 characters.
                        </p>
                    </td>
                    
                </tr>
                <tr>
                    <td class="right">
                        <label for="username">
                            Username:
                        </label>
                    </td>
                    <td class="left">
                        <input type="text"
                    name="username"
                    id="username"
                    value="{{old('username')}}"
                    required
                        >
                        <!--JS ERROR MESSAGE-->
                        <p  class="perror error" id="username-error">
                            Please provide a username between 5-255 characters.
                        </p>
                        <!--LARAVEL ERROR MESSAGE-->
                        @error('username')
                        <p class="error">{{$message}}</p>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td class="right">
                        <label for="email">
                            Email:
                        </label>
                    </td>
                    <td class="left">
                        <input type="text"
                            name="email"
                            id="email"
                            value="{{old('email')}}"
                            required
                        >
                        <!--JS ERROR MESSAGE-->
                        <p  class="perror error" id="email-error">
                            Please provide an email in the right format (ex. movies@movies.com).
                        </p>
                        <!--LARAVEL ERROR MESSAGE-->
                        @error('email')
                        <p class="error">{{$message}}</p>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td class="right">
                        <label for="password">
                            Password:
                        </label>
                    </td>
                    <td class="left">
                        <input type="password"
                            name="password"
                            id="password"
                            required
                        >
                        <!--JS ERROR MESSAGE-->
                        <p class="perror error" id="password-error">
                            Please provide a password between 8-32 characters.
                        </p>
                    </td>
                    
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" class="submit" onclick="validate()">
                            Submit
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
    <script src="/ValidationJS/formValidate.js"></script>
@endsection