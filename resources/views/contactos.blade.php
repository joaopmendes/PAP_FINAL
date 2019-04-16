@extends('layouts.app', ['current'=>'contactos', 'nav_fixed'=>'false'])


@section('title')
    ClinicaSer | Contactos
@endsection


@section('content')
<style>
    .container-fluid{
        padding: 0;
    }
</style>
<div class="container-fluid">
    <div id=contactos_header>

        <div class="offuscate-20">
            <div class="contact-margin-right">
                <h1>Contacte-nos</h1>
                <p class="text-right">
                    Procuramos promover uma transformação na sua vida, quer a
                    nível pessoal, na sua qualidade de vida, a nível profissional
                    ou financeiro e dos relacionamentos interpessoais. Para isso,
                    disponibilizamos um leque multidisciplinar de terapias e
                    formação, pensados à medida de cada um, pois é na individualidade
                    e se encontra o caminho para a tão desejada felicidade, para
                    o encontro de si consigo próprio. É por isso que somos
                    Clínica DE Ser, onde cada um se permitirá, acima de tudo, a Ser.
                </p>
            </div>
        </div>


    </div>

    <div id="info-company">

        <div id = morada class="info-group">
            <h5>Morada da sede</h5>
            <p>Av José Estêvão 449 - B 1º Andar <br> Gafanha da Nazaré</p>
        </div>

        <div id = nif class="info-group">
            <h5>NIF</h5>
            <p>163786267</p>
        </div>

        <div id = contacto class="info-group">
            <h5>Forma de nos contactar</h5>
            <div class="text-black width-50 float-left">
                <p id=subtitle-contact-page class="text-right padding-right-7 margin-0"><strong>E-mail</strong></p>
                <p class="text-right padding-right-3">clinicadeser@gmail.com</p>
            </div>
            <div class="text-black width-50 float-left">
                <p id=subtitle-contact-page class="text-left padding-left-7 margin-0"><strong>Telefone</strong></p>
                <p class="text-left padding-left-3">960390340 ou 915103012</p>
            </div>
        </div>
    </div>

</div>


@endsection
