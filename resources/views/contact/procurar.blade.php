<div class="container">
    <h1>Lista de Contatos</h1>

    <!-- Form de busca -->
    <form class="d-flex mb-3" role="search" action="{{ route('contact.index') }}" method="GET">
        <input class="form-control me-2" type="search" name="q" value="{{ request('q') }}" placeholder="Search" aria-label="Search"/>
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>

    <!-- Lista de contatos -->
    <table>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
        </tr>
        @forelse($contatos as $contato)
            <tr>
                <td>{{ $contato->nome }}</td>
                <td>{{ $contato->email }}</td>
                <td>{{ $contato->telefone }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Nenhum contato encontrado</td>
            </tr>
        @endforelse
    </table>
</div>
