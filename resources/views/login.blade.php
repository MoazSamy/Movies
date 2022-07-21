@extends('layout')
@section('content')
    <h1 align="center">
        Login
    </h1>
    <form method="POST" action="/login" class="needs-validation" align="center" novalidate>
        @csrf
        <table align="center" class="loginTable" cellpadding="5">
            <tbody>
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
                </td>
            </tr>
            <tr align="center" class="error" >
                <td colspan="2">
                    <!--JS ERROR MESSAGE-->
                    <p  class="perror" id="email-error">
                        Please provide an email in the right format (ex. movies@movies.com).
                    </p>
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
                </td>
            </tr>
            <tr align="center" class="error">
                <!--JS ERROR MESSAGE-->
                <td colspan="2">
                    <p class="perror" id="password-error">
                        Please provide a password between 8-32 characters.
                    </p>
                    <!--LARAVEL ERROR MESSAGE-->
                    @error('email')
                        <p class="error">{{$message}}</p>
                    @enderror
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" class="submit" onclick="validate()">
                        Log In
                    </button>
                </td>
            </tr>
        </tbody>
        </table>

    </form>
    <script src="/ValidationJs/loginValidate.js">
        
    </script>
    
@endsection