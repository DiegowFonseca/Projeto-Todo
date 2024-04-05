<x-layout page="Todo: Login">

    <x-slot:btn>
        <a href="{{route('home')}}" class="btn btn-primary">
            Voltar
        </a>
    </x-slot:btn>

    <section id="task_section">
        <h1>Registrar-se</h1>

        @if($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{route('user.register_action')}}">
            @csrf <!--Cria um token que é obrigatório na criação do formulário-->

            <x-form.text_input
            type="text"
            name="name"
            label="Seu nome"
            placeholder="Seu nome"/>

            <x-form.text_input
            type="email"
            name="email"
            label="Seu email"
            placeholder="Seu email"/>

            <x-form.text_input
            type="password"
            name="password"
            label="Sua senha"
            placeholder="Sua senha"/>

            <x-form.text_input
            type="password"
            name="password_confirmation"
            label="Confirme sua Senha"
            placeholder="Confirme sua Senha"/>

            <x-form.form_button resetTxt="Limpar" submitTxt="Registrar-se"/>

        </form>
    </section>
</x-layout>
