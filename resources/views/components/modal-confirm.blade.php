@props([
    'title' => 'Register',
    'type' => '',
    'msg_destroy' => '',
])
<div>
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> <span id="labelTitle">Excluir</span> {{ $title }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center" style="padding-bottom: 0px">
                    Você tem certeza que deseja <span class="labelBody">excluir</span>?
                    <br>
                    <p><b id="titleRegister"></b></p>

                    @if ($msg_destroy != '')
                        <p id="msg_destroy" class="text-warning">{!! $msg_destroy !!}</p>
                    @endif

                    @if ($type != '')
                        <p class="text-danger" style="margin-bottom: 0px; text-align: right;">Essa ação não pode ser
                            desfeita.</p>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                    <a id="btnConfirm" type="button" href="" class="btn btn-primary">Sim, <span
                            class="labelBody">excluir</span></a>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function destroy(route, label, register) {
            $('#msg_destroy').hide();

            if (label === 'destroy' || label === 'deletar') {
                $('#msg_destroy').show();
            }
            label = label.toLowerCase();
            $('#labelTitle').html(label[0].toUpperCase() + label.substr(1));
            $('.labelBody').html(label);
            $('#titleRegister').html(register);
            let link = document.getElementById("btnConfirm");
            link.setAttribute('href', route);
            $('#confirmModal').modal('show');
        }
    </script>
@endpush
