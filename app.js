import { createApp } from 'vue';

// import 'vuetify/lib';
import Menu from './components/Menu';
import Tipo from './components/Tipo';
import User from './components/User';
import UserMudaSenha from './components/MudaSenha';
import Home from './components/Home';
import FileUpload from './components/FileUpload';
import Comandos from './components/Comandos';
import Funcao from './components/Funcao';
import Cep from './components/Cep';
import Cliente from './components/Cliente';
import Parentesco from './components/Parentesco';
import Censo from './components/Censo';
import ClienteCenso from './components/ClienteCenso';
import ClienteContato from './components/ClienteContato';
import ClienteDoc from './components/ClienteDoc';
import Atendimento from './components/Atendimento';
import Unico from './components/Unico';
import Pesquisa from './components/Pesquisa';
import Domicilio from './components/Domicilio';
import Pessoa from './components/Pessoa';
import AtendimentoPesquisa from './components/AtendimentoPesquisa';
// import Cultura from './components/Cultura';
import Localidade from './components/Localidade';
import MenuPerfil from './components/MenuPerfil';
import Homonimos from './components/Homonimo';
import CulturaNew from './components/CulturaNew';
import UserCidade from './components/UserCidade';

import VueTheMask from 'vue-the-mask';
const app = createApp({});

//register the component
app.component('menu-view', Menu);
app.component('tipo-view', Tipo);
app.component('user-view', User);
app.component('usermudasenha-view', UserMudaSenha);
app.component('home-view', Home);
app.component('file-upload', FileUpload);
app.component('comandos-view', Comandos);
app.component('funcao-view', Funcao);
app.component('cliente-view', Cliente);
app.component('cep-view', Cep);
app.component('parentesco-view', Parentesco);
app.component('censo-view', Censo);
app.component('cliente-censo-view', ClienteCenso);
app.component('cliente-contato-view', ClienteContato);
app.component('cliente-doc-view', ClienteDoc);
app.component('atendimento-view', Atendimento);
app.component('unico-view', Unico);
app.component('pesquisa-view', Pesquisa);
app.component('domicilio-view', Domicilio);
app.component('pessoa-view', Pessoa);
app.component('atendimento-pesquisa-view', AtendimentoPesquisa);
// app.component('cultura-view', Cultura);
app.component('localidade-view', Localidade);
app.component('menuperfil-view', MenuPerfil);
app.component('homonimos-view', Homonimos);
app.component('culturanew-view', CulturaNew);
app.component('usercidade-view', UserCidade);
app.use(VueTheMask);

//..HTML element to mount the Vue application
app.mount('#app');

require('./bootstrap');