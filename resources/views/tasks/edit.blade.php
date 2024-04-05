<x-layout page="Todo: Login">

    <x-slot:btn>
        <a href="{{route('home')}}" class="btn btn-primary">
            Voltar
        </a>
    </x-slot:btn>

    <section id="task_section">
        <h1>Editar Tarefa</h1>

        <form method="POST" action="{{route('task.edit_action')}}">
            @csrf <!--Cria um token que é obrigatório na criação do formulário-->
            <input type="hidden" name="id" value="{{$task->id}}">

            <x-form.checkbox_input
            name="is_done"
            label="Tarefa Realizada?"
            checked="{{$task->is_done}}"
            />

            <x-form.text_input
            name="title"
            label="Título da Task"
            placeholder="Digite o título da sua task"
            value="{{$task->title}}"
            />

            <x-form.text_input
            type="datetime-local"
            name="due_date"
            label="Data de Realização"
            value="{{$task->due_date}}"
            />

            <x-form.select_input
            name="category_id"
            label="Categoria"
            placeholder="Digite o título da sua task">
            @foreach($categories as $category)
                <option value="{{$category->id}}"
                    @if($category->id == $task->category_id)
                        selected
                    @endif
                    >{{$category->title}}</option>
            @endforeach
            </x-form.select_input>

            <x-form.textarea_input
            label="Descrição da tarefa"
            name="description"
            placeholder="Digite a descrição da tarefa"
            value="{{$task->description}}"
            />

            <x-form.form_button resetTxt="Resetar" submitTxt="Atualizar tarefa"/>

        </form>
    </section>
</x-layout>
