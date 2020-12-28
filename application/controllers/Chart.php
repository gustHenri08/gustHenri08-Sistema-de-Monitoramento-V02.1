<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
class Chart extends REST_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function getinfo_get() {
        $cp = $this->session->userdata("unidadeprisional");
        $maleCount = $this->db->query("SELECT COUNT(*) as SEX_COUNT FROM tbl_presos WHERE sexo = 'Masculino' and cadeiapublica = '$cp' ")->row_array();
        $femaleCount = $this->db->query("SELECT COUNT(*) as SEX_COUNT FROM tbl_presos WHERE sexo = 'Feminino' and cadeiapublica = '$cp' ")->row_array();
        $regimeAbertoCount = $this->db->query("SELECT COUNT(*) as SEX_COUNT FROM tbl_presos WHERE regime = 'Aberto' and cadeiapublica = '$cp' ")->row_array();
        $regimeSemiCount = $this->db->query("SELECT COUNT(*) as SEX_COUNT FROM tbl_presos WHERE regime = 'Semi-Aberto' and cadeiapublica = '$cp' ")->row_array();
        $regimeFechadoCount = $this->db->query("SELECT COUNT(*) as SEX_COUNT FROM tbl_presos WHERE regime = 'Fechado' and cadeiapublica = '$cp' ")->row_array();
        $this->response(
            (object) [
                'maleCount' => $maleCount, 
                'femaleCount' => $femaleCount,
                'regimeAberto' => $regimeAbertoCount,
                'regimeSemi' => $regimeSemiCount,
                'regimeFechado' => $regimeFechadoCount
            ]
        , REST_Controller::HTTP_OK);
    }
    public function getexit_get() {
        $cp = $this->session->userdata("unidadeprisional");
        $alvaraCount = $this->db->query("SELECT COUNT(*) as MOT_COUNT FROM tbl_saidadetentos WHERE 	motivo = 'Alvará de Soltura' and cadeiapublica = '$cp'")->row_array();
        $delegCount = $this->db->query("SELECT COUNT(*) as MOT_COUNT FROM tbl_saidadetentos WHERE 	motivo = 'Delegacia' and cadeiapublica = '$cp'")->row_array();
        $domicCount = $this->db->query("SELECT COUNT(*) as MOT_COUNT FROM tbl_saidadetentos WHERE motivo = 'Domiciliar COVID' and cadeiapublica = '$cp'")->row_array();
        $evasaoCount = $this->db->query("SELECT COUNT(*) as MOT_COUNT FROM tbl_saidadetentos WHERE motivo = 'Evasão' and cadeiapublica = '$cp'")->row_array();
        $fimPrazoCivilCount = $this->db->query("SELECT COUNT(*) as MOT_COUNT FROM tbl_saidadetentos WHERE motivo = 'Fim de Prazo da Prisão Civil' and cadeiapublica = '$cp'")->row_array();
        $fimPrazoTempCount = $this->db->query("SELECT COUNT(*) as MOT_COUNT FROM tbl_saidadetentos WHERE 	motivo = 'Fim de Prazo da Prisão Temporario' and cadeiapublica = '$cp'")->row_array();
        $fugaCount = $this->db->query("SELECT COUNT(*) as MOT_COUNT FROM tbl_saidadetentos WHERE 	motivo = 'Fuga' and cadeiapublica = '$cp'")->row_array();
        $HarmCount = $this->db->query("SELECT COUNT(*) as MOT_COUNT FROM tbl_saidadetentos WHERE motivo = 'Harmonizado' and cadeiapublica = '$cp'")->row_array();
        $condCount = $this->db->query("SELECT COUNT(*) as MOT_COUNT FROM tbl_saidadetentos WHERE motivo = 'Liberdade Condicional' and cadeiapublica = '$cp'")->row_array();
        $obitoCount = $this->db->query("SELECT COUNT(*) as MOT_COUNT FROM tbl_saidadetentos WHERE motivo = 'Óbito' and cadeiapublica = '$cp'")->row_array();
        $obitoCVLICount = $this->db->query("SELECT COUNT(*) as MOT_COUNT FROM tbl_saidadetentos WHERE motivo = 'Óbito CVLI' and cadeiapublica = '$cp'")->row_array();
        $PrisaoDomiCount = $this->db->query("SELECT COUNT(*) as MOT_COUNT FROM tbl_saidadetentos WHERE motivo = 'Prisão Domiciliar' and cadeiapublica = '$cp'")->row_array();
        $ProgressRegimeCount = $this->db->query("SELECT COUNT(*) as MOT_COUNT FROM tbl_saidadetentos WHERE motivo = 'Progressão de Regime' and cadeiapublica = '$cp'")->row_array();
        $transfCpCount = $this->db->query("SELECT COUNT(*) as MOT_COUNT FROM tbl_saidadetentos WHERE 	motivo = 'Transferência P/CP' and cadeiapublica = '$cp'")->row_array();
        $transfUfCount = $this->db->query("SELECT COUNT(*) as MOT_COUNT FROM tbl_saidadetentos WHERE 	motivo = 'Transferência P/UF' and cadeiapublica = '$cp'")->row_array();
        $transfUpCount = $this->db->query("SELECT COUNT(*) as MOT_COUNT FROM tbl_saidadetentos WHERE    motivo = 'Transferência P/UP' and cadeiapublica = '$cp'")->row_array();
        $transitoCount = $this->db->query("SELECT COUNT(*) as MOT_COUNT FROM tbl_saidadetentos WHERE    motivo = 'Transito' and cadeiapublica = '$cp'")->row_array();
        $outrosCount = $this->db->query("SELECT COUNT(*) as MOT_COUNT FROM tbl_saidadetentos WHERE      motivo = 'Outros' and cadeiapublica = '$cp'")->row_array();
        $this->response(
            (object)[
                'alvaraCount' =>  $alvaraCount, 
                'delegCount' => $delegCount,
                'domicCount' => $domicCount,
                'evasaoCount' => $evasaoCount,
                'fimPrazoCivilCount' => $fimPrazoCivilCount,
                'fimPrazoTempCount' => $fimPrazoTempCount,
                'fugaCount' =>  $fugaCount, 
                'HarmCount' => $HarmCount,
                'condCount' => $condCount,
                'obitoCount' => $obitoCount,
                'obitoCVLICount' =>  $obitoCVLICount, 
                'PrisaoDomiCount' => $PrisaoDomiCount,
                'ProgressRegimeCount' => $ProgressRegimeCount,
                'transfCpCount' => $transfCpCount ,
                'transfUfCount' => $transfUfCount,
                'transfUpCount' =>  $transfUpCount, 
                'transitoCount' => $transitoCount,
                'outrosCount' => $outrosCount
            ],
            REST_Controller::HTTP_OK
        );
    }

    public function getEntrada_get() {
        $cp = $this->session->userdata("unidadeprisional");
        $expiraPrazoCount = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Expiração de Prazo' and cadeiapublica = '$cp'")->row_array();
        $mandadoPrisCivilCount = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Mandado de Prisão Civil' and cadeiapublica = '$cp'")->row_array();
        $mandadoPrisPrevCount = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Mandado de Prisão Preventiva' and cadeiapublica = '$cp'")->row_array();
        $mandadoPrisTempCount = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Mandado de Prisão Temporária' and cadeiapublica = '$cp'")->row_array();
        $mandadoRecolhimentoCount = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Mandado de Recolhimento' and cadeiapublica = '$cp'")->row_array();
        $recapturaCount = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Recaptura - Mandado de Prisão' and cadeiapublica = '$cp'")->row_array();
        $transferenciaCount = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Transferência' and cadeiapublica = '$cp'")->row_array();
        $transito2Count = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Trânsito' and cadeiapublica = '$cp'")->row_array();
        $outros2Count = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Outros' and cadeiapublica = '$cp'")->row_array();
        $this->response(
            (object) [
                'expiraPrazoCount' => $expiraPrazoCount, 
                'mandadoPrisCivilCount' => $mandadoPrisCivilCount,
                'mandadoPrisPrevCount' => $mandadoPrisPrevCount,
                'mandadoPrisTempCount' => $mandadoPrisTempCount,
                'mandadoRecolhimentoCount' => $mandadoRecolhimentoCount,
                'recapturaCount' => $recapturaCount, 
                'transferenciaCount' => $transferenciaCount,
                'transito2Count' => $transito2Count,
                'outros2Count' => $outros2Count
            ]
        , REST_Controller::HTTP_OK);
    }

    public function getAutorizaSaida_get() {
        $cp = $this->session->userdata("unidadeprisional");
        $audienciaCount = $this->db->query("SELECT COUNT(*) as AUT_AUD_COUNT FROM tbl_saidaaudiencia WHERE cadeiapublica = '$cp' ")->row_array();
        $consultaMedCount = $this->db->query("SELECT COUNT(*) as AUT_AUD_COUNT FROM tbl_saidasaude WHERE motivo = 'Consulta Médica' and cadeiapublica = '$cp'")->row_array();
        $consultaOdontoCount = $this->db->query("SELECT COUNT(*) as AUT_AUD_COUNT FROM tbl_saidasaude WHERE motivo = 'Consulta Odontológica' and cadeiapublica = '$cp'")->row_array();
        $EmergenciaCount = $this->db->query("SELECT COUNT(*) as AUT_AUD_COUNT FROM tbl_saidasaude WHERE motivo = 'Emergência' and cadeiapublica = '$cp'")->row_array();
        $EscoltaFunCount = $this->db->query("SELECT COUNT(*) as AUT_AUD_COUNT FROM tbl_saidadetentos WHERE motivo = 'Óbito' and cadeiapublica = '$cp'")->row_array();
        $ExamesComplexCount = $this->db->query("SELECT COUNT(*) as AUT_AUD_COUNT FROM tbl_saidasaude WHERE motivo = 'Exames Complexos' and cadeiapublica = '$cp'")->row_array();
        $ExamesLaboratorCount = $this->db->query("SELECT COUNT(*) as AUT_AUD_COUNT FROM tbl_saidasaude WHERE motivo = 'Exames Laboratoriais' and cadeiapublica = '$cp'")->row_array();
        $outros3Count = $this->db->query("SELECT COUNT(*) as AUT_AUD_COUNT FROM tbl_saidasaude WHERE motivo = 'Outros' and cadeiapublica = '$cp'")->row_array();
        $this->response(
            (object) [
                'audienciaCount' => $audienciaCount, 
                'consultaMedCount' => $consultaMedCount,
                'consultaOdontoCount' => $consultaOdontoCount,
                'EmergenciaCount' => $EmergenciaCount,
                'EscoltaFunCount' => $EscoltaFunCount,
                'ExamesComplexCount' => $ExamesComplexCount, 
                'ExamesLaboratorCount' => $ExamesLaboratorCount,
                'outros3Count' => $outros3Count
            ]
        , REST_Controller::HTTP_OK);
    }

    //Admin 
    public function getinfoArcoverde_get() {
        $maleCountArcoverde = $this->db->query("SELECT COUNT(*) as SEX_COUNT FROM tbl_presos WHERE sexo = 'Masculino' and nucleo = 'Arcoverde'")->row_array();
        $femaleCountArcoverde = $this->db->query("SELECT COUNT(*) as SEX_COUNT FROM tbl_presos WHERE sexo = 'Feminino' and nucleo = 'Arcoverde'")->row_array();
        $regimeAbertoCountArcoverde = $this->db->query("SELECT COUNT(*) as SEX_COUNT FROM tbl_presos WHERE regime = 'Aberto' and nucleo = 'Arcoverde'")->row_array();
        $regimeSemiCountArcoverde = $this->db->query("SELECT COUNT(*) as SEX_COUNT FROM tbl_presos WHERE regime = 'Semi-Aberto' and nucleo = 'Arcoverde'")->row_array();
        $regimeFechadoCountArcoverde = $this->db->query("SELECT COUNT(*) as SEX_COUNT FROM tbl_presos WHERE regime = 'Fechado' and nucleo = 'Arcoverde'")->row_array();
        $this->response(
            (object) [
                'maleCountArcoverde' => $maleCountArcoverde, 
                'femaleCountArcoverde' => $femaleCountArcoverde,
                'regimeAbertoCountArcoverde' => $regimeAbertoCountArcoverde,
                'regimeSemiCountArcoverde' => $regimeSemiCountArcoverde,
                'regimeFechadoCountArcoverde' => $regimeFechadoCountArcoverde
            ]
        , REST_Controller::HTTP_OK);
    }

    public function getinfoCaruaru_get() {
        $maleCountCaruaru = $this->db->query("SELECT COUNT(*) as SEX_COUNT FROM tbl_presos WHERE sexo = 'Masculino' and nucleo = 'Caruaru'")->row_array();
        $femaleCountCaruaru = $this->db->query("SELECT COUNT(*) as SEX_COUNT FROM tbl_presos WHERE sexo = 'Feminino' and nucleo = 'Caruaru'")->row_array();
        $regimeAbertoCountCaruaru = $this->db->query("SELECT COUNT(*) as SEX_COUNT FROM tbl_presos WHERE regime = 'Aberto' and nucleo = 'Caruaru'")->row_array();
        $regimeSemiCountCaruaru = $this->db->query("SELECT COUNT(*) as SEX_COUNT FROM tbl_presos WHERE regime = 'Semi-Aberto' and nucleo = 'Caruaru'")->row_array();
        $regimeFechadoCountCaruaru = $this->db->query("SELECT COUNT(*) as SEX_COUNT FROM tbl_presos WHERE regime = 'Fechado' and nucleo = 'Caruaru'")->row_array();
        $this->response(
            (object) [
                'maleCountCaruaru' => $maleCountCaruaru, 
                'femaleCountCaruaru' => $femaleCountCaruaru,
                'regimeAbertoCountCaruaru' => $regimeAbertoCountCaruaru,
                'regimeSemiCountCaruaru' => $regimeSemiCountCaruaru,
                'regimeFechadoCountCaruaru' => $regimeFechadoCountCaruaru
            ]
        , REST_Controller::HTTP_OK);
    }

    public function getinfoGaranhuns_get() {
        $maleCountGaranhuns = $this->db->query("SELECT COUNT(*) as SEX_COUNT FROM tbl_presos WHERE sexo = 'Masculino' and nucleo = 'Garanhuns'")->row_array();
        $femaleCountGaranhuns = $this->db->query("SELECT COUNT(*) as SEX_COUNT FROM tbl_presos WHERE sexo = 'Feminino' and nucleo = 'Garanhuns'")->row_array();
        $regimeAbertoCountGaranhuns = $this->db->query("SELECT COUNT(*) as SEX_COUNT FROM tbl_presos WHERE regime = 'Aberto' and nucleo = 'Garanhuns'")->row_array();
        $regimeSemiCountGaranhuns = $this->db->query("SELECT COUNT(*) as SEX_COUNT FROM tbl_presos WHERE regime = 'Semi-Aberto' and nucleo = 'Garanhuns'")->row_array();
        $regimeFechadoCountGaranhuns = $this->db->query("SELECT COUNT(*) as SEX_COUNT FROM tbl_presos WHERE regime = 'Fechado' and nucleo = 'Garanhuns'")->row_array();
        $this->response(
            (object) [
                'maleCountGaranhuns' => $maleCountGaranhuns, 
                'femaleCountGaranhuns' => $femaleCountGaranhuns,
                'regimeAbertoCountGaranhuns' => $regimeAbertoCountGaranhuns,
                'regimeSemiCountGaranhuns' => $regimeSemiCountGaranhuns,
                'regimeFechadoCountGaranhuns' => $regimeFechadoCountGaranhuns
            ]
        , REST_Controller::HTTP_OK);
    }

    public function getinfoLagoa_get() {
        $maleCountLagoa = $this->db->query("SELECT COUNT(*) as SEX_COUNT FROM tbl_presos WHERE sexo = 'Masculino' and nucleo = 'Lagoa'")->row_array();
        $femaleCountLagoa = $this->db->query("SELECT COUNT(*) as SEX_COUNT FROM tbl_presos WHERE sexo = 'Feminino' and nucleo = 'Lagoa'")->row_array();
        $regimeAbertoCountLagoa = $this->db->query("SELECT COUNT(*) as SEX_COUNT FROM tbl_presos WHERE regime = 'Aberto' and nucleo = 'Lagoa'")->row_array();
        $regimeSemiCountLagoa = $this->db->query("SELECT COUNT(*) as SEX_COUNT FROM tbl_presos WHERE regime = 'Semi-Aberto' and nucleo = 'Lagoa'")->row_array();
        $regimeFechadoCountLagoa = $this->db->query("SELECT COUNT(*) as SEX_COUNT FROM tbl_presos WHERE regime = 'Fechado' and nucleo = 'Lagoa'")->row_array();
        $this->response(
            (object) [
                'maleCountLagoa' => $maleCountLagoa, 
                'femaleCountLagoa' => $femaleCountLagoa,
                'regimeAbertoCountLagoa' => $regimeAbertoCountLagoa,
                'regimeSemiCountLagoa' => $regimeSemiCountLagoa,
                'regimeFechadoCountLagoa' => $regimeFechadoCountLagoa
            ]
        , REST_Controller::HTTP_OK);
    }

    public function getinfoPetrolina_get() {
        $maleCountPetrolina = $this->db->query("SELECT COUNT(*) as SEX_COUNT FROM tbl_presos WHERE sexo = 'Masculino' and nucleo = 'Petrolina'")->row_array();
        $femaleCountPetrolina = $this->db->query("SELECT COUNT(*) as SEX_COUNT FROM tbl_presos WHERE sexo = 'Feminino' and nucleo = 'Petrolina'")->row_array();
        $regimeAbertoCountPetrolina = $this->db->query("SELECT COUNT(*) as SEX_COUNT FROM tbl_presos WHERE regime = 'Aberto' and nucleo = 'Petrolina'")->row_array();
        $regimeSemiCountPetrolina = $this->db->query("SELECT COUNT(*) as SEX_COUNT FROM tbl_presos WHERE regime = 'Semi-Aberto' and nucleo = 'Petrolina'")->row_array();
        $regimeFechadoCountPetrolina = $this->db->query("SELECT COUNT(*) as SEX_COUNT FROM tbl_presos WHERE regime = 'Fechado' and nucleo = 'Petrolina'")->row_array();
        $this->response(
            (object) [
                'maleCountPetrolina' => $maleCountPetrolina, 
                'femaleCountPetrolina' => $femaleCountPetrolina,
                'regimeAbertoCountPetrolina' => $regimeAbertoCountPetrolina,
                'regimeSemiCountPetrolina' => $regimeSemiCountPetrolina,
                'regimeFechadoCountPetrolina' => $regimeFechadoCountPetrolina
            ]
        , REST_Controller::HTTP_OK);
    }

    public function getinfoSalgueiro_get() {
        $maleCountSalgueiro = $this->db->query("SELECT COUNT(*) as SEX_COUNT FROM tbl_presos WHERE sexo = 'Masculino' and nucleo = 'Salgueiro'")->row_array();
        $femaleCountSalgueiro = $this->db->query("SELECT COUNT(*) as SEX_COUNT FROM tbl_presos WHERE sexo = 'Feminino' and nucleo = 'Salgueiro'")->row_array();
        $regimeAbertoCountSalgueiro = $this->db->query("SELECT COUNT(*) as SEX_COUNT FROM tbl_presos WHERE regime = 'Aberto' and nucleo = 'Salgueiro'")->row_array();
        $regimeSemiCountSalgueiro = $this->db->query("SELECT COUNT(*) as SEX_COUNT FROM tbl_presos WHERE regime = 'Semi-Aberto' and nucleo = 'Salgueiro'")->row_array();
        $regimeFechadoCountSalgueiro = $this->db->query("SELECT COUNT(*) as SEX_COUNT FROM tbl_presos WHERE regime = 'Fechado' and nucleo = 'Salgueiro'")->row_array();
        $this->response(
            (object) [
                'maleCountSalgueiro' => $maleCountSalgueiro, 
                'femaleCountSalgueiro' => $femaleCountSalgueiro,
                'regimeAbertoCountSalgueiro' => $regimeAbertoCountSalgueiro,
                'regimeSemiCountSalgueiro' => $regimeSemiCountSalgueiro,
                'regimeFechadoCountSalgueiro' => $regimeFechadoCountSalgueiro
            ]
        , REST_Controller::HTTP_OK);
    }
    
    public function getEntradaArcoverde_get() {
        $expiraPrazoCountArcoverde = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Expiração de Prazo' and nucleo = 'Arcoverde'")->row_array();
        $mandadoPrisCivilCountArcoverde = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Mandado de Prisão Civil' and nucleo = 'Arcoverde'")->row_array();
        $mandadoPrisPrevCountArcoverde = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Mandado de Prisão Preventiva' and nucleo = 'Arcoverde'")->row_array();
        $mandadoPrisTempCountArcoverde = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Mandado de Prisão Temporária' and nucleo = 'Arcoverde'")->row_array();
        $mandadoRecolhimentoCountArcoverde = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Mandado de Recolhimento' and nucleo = 'Arcoverde'")->row_array();
        $recapturaCountArcoverde = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Recaptura - Mandado de Prisão' and nucleo = 'Arcoverde'")->row_array();
        $transferenciaCountArcoverde = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Transferência' and nucleo = 'Arcoverde'")->row_array();
        $transito2CountArcoverde = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Trânsito' and nucleo = 'Arcoverde'")->row_array();
        $outros2CountArcoverde = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Outros' and nucleo = 'Arcoverde'")->row_array();
        $this->response(
            (object) [
                'expiraPrazoCountArcoverde' => $expiraPrazoCountArcoverde, 
                'mandadoPrisCivilCountArcoverde' => $mandadoPrisCivilCountArcoverde,
                'mandadoPrisPrevCountArcoverde' => $mandadoPrisPrevCountArcoverde,
                'mandadoPrisTempCountArcoverde' => $mandadoPrisTempCountArcoverde,
                'mandadoRecolhimentoCountArcoverde' => $mandadoRecolhimentoCountArcoverde,
                'recapturaCountArcoverde' => $recapturaCountArcoverde, 
                'transferenciaCountArcoverde' => $transferenciaCountArcoverde,
                'transito2CountArcoverde' => $transito2CountArcoverde,
                'outros2CountArcoverde' => $outros2CountArcoverde
            ]
        , REST_Controller::HTTP_OK);
    }

    public function getEntradaCaruaru_get() {
        $expiraPrazoCountCaruaru = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Expiração de Prazo' and nucleo = 'Caruaru'")->row_array();
        $mandadoPrisCivilCountCaruaru = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Mandado de Prisão Civil' and nucleo = 'Caruaru'")->row_array();
        $mandadoPrisPrevCountCaruaru = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Mandado de Prisão Preventiva' and nucleo = 'Caruaru'")->row_array();
        $mandadoPrisTempCountCaruaru = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Mandado de Prisão Temporária' and nucleo = 'Caruaru'")->row_array();
        $mandadoRecolhimentoCountCaruaru = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Mandado de Recolhimento' and nucleo = 'Caruaru'")->row_array();
        $recapturaCountCaruaru = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Recaptura - Mandado de Prisão' and nucleo = 'Caruaru'")->row_array();
        $transferenciaCountCaruaru = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Transferência' and nucleo = 'Caruaru'")->row_array();
        $transito2CountCaruaru = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Trânsito' and nucleo = 'Caruaru'")->row_array();
        $outros2CountCaruaru = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Outros' and nucleo = 'Caruaru'")->row_array();
        $this->response(
            (object) [
                'expiraPrazoCountCaruaru' => $expiraPrazoCountCaruaru, 
                'mandadoPrisCivilCountCaruaru' => $mandadoPrisCivilCountCaruaru,
                'mandadoPrisPrevCountCaruaru' => $mandadoPrisPrevCountCaruaru,
                'mandadoPrisTempCountCaruaru' => $mandadoPrisTempCountCaruaru,
                'mandadoRecolhimentoCountCaruaru' => $mandadoRecolhimentoCountCaruaru,
                'recapturaCountCaruaru' => $recapturaCountCaruaru, 
                'transferenciaCountCaruaru' => $transferenciaCountCaruaru,
                'transito2CountCaruaru' => $transito2CountCaruaru,
                'outros2CountCaruaru' => $outros2CountCaruaru
            ]
        , REST_Controller::HTTP_OK);
    }

    public function getEntradaGaranhuns_get() {
        $expiraPrazoCountGaranhuns = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Expiração de Prazo' and nucleo = 'Garanhuns'")->row_array();
        $mandadoPrisCivilCountGaranhuns = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Mandado de Prisão Civil' and nucleo = 'Garanhuns'")->row_array();
        $mandadoPrisPrevCountGaranhuns = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Mandado de Prisão Preventiva' and nucleo = 'Garanhuns'")->row_array();
        $mandadoPrisTempCountGaranhuns = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Mandado de Prisão Temporária' and nucleo = 'Garanhuns'")->row_array();
        $mandadoRecolhimentoCountGaranhuns = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Mandado de Recolhimento' and nucleo = 'Garanhuns'")->row_array();
        $recapturaCountGaranhuns = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Recaptura - Mandado de Prisão' and nucleo = 'Garanhuns'")->row_array();
        $transferenciaCountGaranhuns = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Transferência' and nucleo = 'Garanhuns'")->row_array();
        $transito2CountGaranhuns = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Trânsito' and nucleo = 'Garanhuns'")->row_array();
        $outros2CountGaranhuns = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Outros' and nucleo = 'Garanhuns'")->row_array();
        $this->response(
            (object) [
                'expiraPrazoCountGaranhuns' => $expiraPrazoCountGaranhuns, 
                'mandadoPrisCivilCountGaranhuns' => $mandadoPrisCivilCountGaranhuns,
                'mandadoPrisPrevCountGaranhuns' => $mandadoPrisPrevCountGaranhuns,
                'mandadoPrisTempCountGaranhuns' => $mandadoPrisTempCountGaranhuns,
                'mandadoRecolhimentoCountGaranhuns' => $mandadoRecolhimentoCountGaranhuns,
                'recapturaCountGaranhuns' => $recapturaCountGaranhuns, 
                'transferenciaCountGaranhuns' => $transferenciaCountGaranhuns,
                'transito2CountGaranhuns' => $transito2CountGaranhuns,
                'outros2CountGaranhuns' => $outros2CountGaranhuns
            ]
        , REST_Controller::HTTP_OK);
    }

    public function getEntradaLagoa_get() {
        $expiraPrazoCountLagoa = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Expiração de Prazo' and nucleo = 'Lagoa'")->row_array();
        $mandadoPrisCivilCountLagoa = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Mandado de Prisão Civil' and nucleo = 'Lagoa'")->row_array();
        $mandadoPrisPrevCountLagoa = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Mandado de Prisão Preventiva' and nucleo = 'Lagoa'")->row_array();
        $mandadoPrisTempCountLagoa = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Mandado de Prisão Temporária' and nucleo = 'Lagoa'")->row_array();
        $mandadoRecolhimentoCountLagoa = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Mandado de Recolhimento' and nucleo = 'Lagoa'")->row_array();
        $recapturaCountLagoa = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Recaptura - Mandado de Prisão' and nucleo = 'Lagoa'")->row_array();
        $transferenciaCountLagoa = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Transferência' and nucleo = 'Lagoa'")->row_array();
        $transito2CountLagoa = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Trânsito' and nucleo = 'Lagoa'")->row_array();
        $outros2CountLagoa = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Outros' and nucleo = 'Lagoa'")->row_array();
        $this->response(
            (object) [
                'expiraPrazoCountLagoa' => $expiraPrazoCountLagoa, 
                'mandadoPrisCivilCountLagoa' => $mandadoPrisCivilCountLagoa,
                'mandadoPrisPrevCountLagoa' => $mandadoPrisPrevCountLagoa,
                'mandadoPrisTempCountLagoa' => $mandadoPrisTempCountLagoa,
                'mandadoRecolhimentoCountLagoa' => $mandadoRecolhimentoCountLagoa,
                'recapturaCountLagoa' => $recapturaCountLagoa, 
                'transferenciaCountLagoa' => $transferenciaCountLagoa,
                'transito2CountLagoa' => $transito2CountLagoa,
                'outros2CountLagoa' => $outros2CountLagoa
            ]
        , REST_Controller::HTTP_OK);
    }

    public function getEntradaPetrolina_get() {
        $expiraPrazoCountPetrolina = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Expiração de Prazo' and nucleo = 'Petrolina'")->row_array();
        $mandadoPrisCivilCountPetrolina = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Mandado de Prisão Civil' and nucleo = 'Petrolina'")->row_array();
        $mandadoPrisPrevCountPetrolina = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Mandado de Prisão Preventiva' and nucleo = 'Petrolina'")->row_array();
        $mandadoPrisTempCountPetrolina = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Mandado de Prisão Temporária' and nucleo = 'Petrolina'")->row_array();
        $mandadoRecolhimentoCountPetrolina = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Mandado de Recolhimento' and nucleo = 'Petrolina'")->row_array();
        $recapturaCountPetrolina = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Recaptura - Mandado de Prisão' and nucleo = 'Petrolina'")->row_array();
        $transferenciaCountPetrolina = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Transferência' and nucleo = 'Petrolina'")->row_array();
        $transito2CountPetrolina = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Trânsito' and nucleo = 'Petrolina'")->row_array();
        $outros2CountPetrolina = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Outros' and nucleo = 'Petrolina'")->row_array();
        $this->response(
            (object) [
                'expiraPrazoCountPetrolina' => $expiraPrazoCountPetrolina, 
                'mandadoPrisCivilCountPetrolina' => $mandadoPrisCivilCountPetrolina,
                'mandadoPrisPrevCountPetrolina' => $mandadoPrisPrevCountPetrolina,
                'mandadoPrisTempCountPetrolina' => $mandadoPrisTempCountPetrolina,
                'mandadoRecolhimentoCountPetrolina' => $mandadoRecolhimentoCountPetrolina,
                'recapturaCountPetrolina' => $recapturaCountPetrolina, 
                'transferenciaCountPetrolina' => $transferenciaCountPetrolina,
                'transito2CountPetrolina' => $transito2CountPetrolina,
                'outros2CountPetrolina' => $outros2CountPetrolina
            ]
        , REST_Controller::HTTP_OK);
    }

    public function getEntradaSalgueiro_get() {
        $expiraPrazoCountSalgueiro = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Expiração de Prazo' and nucleo = 'Salgueiro'")->row_array();
        $mandadoPrisCivilCountSalgueiro = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Mandado de Prisão Civil' and nucleo = 'Salgueiro'")->row_array();
        $mandadoPrisPrevCountSalgueiro = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Mandado de Prisão Preventiva' and nucleo = 'Salgueiro'")->row_array();
        $mandadoPrisTempCountSalgueiro = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Mandado de Prisão Temporária' and nucleo = 'Salgueiro'")->row_array();
        $mandadoRecolhimentoCountSalgueiro = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Mandado de Recolhimento' and nucleo = 'Salgueiro'")->row_array();
        $recapturaCountSalgueiro = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Recaptura - Mandado de Prisão' and nucleo = 'Salgueiro'")->row_array();
        $transferenciaCountSalgueiro = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Transferência' and nucleo = 'Salgueiro'")->row_array();
        $transito2CountSalgueiro = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Trânsito' and nucleo = 'Salgueiro'")->row_array();
        $outros2CountSalgueiro = $this->db->query("SELECT COUNT(*) as MOT_ENT_COUNT FROM tbl_presos WHERE motivo = 'Outros' and nucleo = 'Salgueiro'")->row_array();
        $this->response(
            (object) [
                'expiraPrazoCountSalgueiro' => $expiraPrazoCountSalgueiro, 
                'mandadoPrisCivilCountSalgueiro' => $mandadoPrisCivilCountSalgueiro,
                'mandadoPrisPrevCountSalgueiro' => $mandadoPrisPrevCountSalgueiro,
                'mandadoPrisTempCountSalgueiro' => $mandadoPrisTempCountSalgueiro,
                'mandadoRecolhimentoCountSalgueiro' => $mandadoRecolhimentoCountSalgueiro,
                'recapturaCountSalgueiro' => $recapturaCountSalgueiro, 
                'transferenciaCountSalgueiro' => $transferenciaCountSalgueiro,
                'transito2CountSalgueiro' => $transito2CountSalgueiro,
                'outros2CountSalgueiro' => $outros2CountSalgueiro
            ]
        , REST_Controller::HTTP_OK);
    }
}
?>