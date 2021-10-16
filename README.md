# Agendamento de procedimentos

<!-- Insert menu here -->

## Sobre o projeto

  O sistema auxilia o proocesso de encaminhamentos para procedimentos oftamológicos solicitados durantes os multirões do Insituto Mais Visão. Com a utilização do mesmo o fluxo de trabalho passa a ser digitalizado de forma a aumentar a eficência e reduzir o tempo de agendamento dos procedimentos.

## Tecnologias utilizadas

- [Laravel](https://laravel.com/)
- [Bootstrap](https://getbootstrap.com/)

## Documentação

### Caso de uso
<!-- Insert user case here -->

**Atores**
- Secretaria municipal
- Setor de documentos
- Central de agendamentos

### Diagrama atividades
<!-- Insert activity diagrame here -->

**Etapas**
1. Solicitação enviada (_Secretaria municipal_)
   - Anexar documentos digitalizados

2. Trocar cartão SUS (_Setor de documentos_)
  - Troca do nº do cartão SUS
  - Endereço de Salvador (BA)
  - Anexar novo nº do cartão

3. Agendar procedimento (_Central de agendamento_)
  - Informar local, data e hora do procedimento
  - Anexar nº da senha do procedimenrto 
  - Notificar a _Secretaria municipal_
