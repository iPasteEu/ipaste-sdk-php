<?php
/**
 * iPaste.eu PHP API
 * Copyright 2013, iPaste.eu
 * Compatible with iPaste Web Service Engine 1.0
 * @version 1.0
 */

/**
 * Class iPasteICore
 * All public methods, so that these are the functions that you must use in order to make valid server requests
 * to the iPaste.eu platform.
 * Implemented by iPaste class
 */
interface iPasteICore extends iPasteIConstants
{

    /**
     * Call first this function in order to be abble to make other types of request.
     * @param string $devKey is your private key which you find on your iPaste profile page
     * @param string $username users username, could be your iPaste username
     * @param string $password users password, could be your iPaste password
     * @return mixed temporary key or KO with error description
     */
    public function login($devKey = null, $username = null, $password = null);

    /**
     * Retrieves users paste IDs formatted according to the input format value.
     * @param string $format response format @see iPasteIResponseListFormat for valid formats
     * @param string $username users username, could be your username. If username is null, it will return all logged
     * in users paste IDs (both private and pubblic), else it will return public users pastes.
     * @param string $tmpKey temporary key returned by the login function. Leave it to null if you want to use the
     * temporary key returned by login function.
     * @return mixed textual or JSON list (according to the input format) of users pastes or an KO with the error
     * description
     */
    public function getUserPastes($format = iPasteIResponseListFormat::JSON, $username = null, $tmpKey = null);

    /**
     * Updates users paste. You shoud set the iPastePaste id otherwise it will return an KO.
     * @param iPastePaste $paste paste that must be updated
     * @param string $tmpKey temporary key returned by the login function. Leave it to null if you want to use the
     * temporary key returned by login function.
     * @return mixed paste ID or an KO with the error description
     */
    public function update(iPastePaste $paste, $tmpKey = null);

    /**
     * Inserts a new paste.
     * @param iPastePaste $paste that must be inserted
     * @param string $tmpKey temporary key returned by the login function. Leave it to null if you want to use the
     * temporary key returned by login function.
     * @return mixed paste ID of the new paste or an KO with the error description
     */
    public function paste(iPastePaste $paste, $tmpKey = null);

    /**
     * Remove a paste by passing it's paste ID. If you will try to remove an unexisting paste (for example by removing
     * the same paste for many times), it will return always OK as response.
     * @param int $pasteId paste identification number
     * @param string $tmpKey temporary key returned by the login function. Leave it to null if you want to use the
     * temporary key returned by login function.
     * @return mixed OK or an KO with the error description
     */
    public function remove($pasteId, $tmpKey = null);

    /**
     * Retrieves paste
     * @param $pasteID
     * @param string $format
     * @param null $tmpKeys
     * @return mixed
     */
    public function get($pasteID, $format = iPasteIResponsePasteFormat::JSON, $tmpKeys = null);

}

/**
 * Class iPasteIConstants
 * Valid constants for iPasteCore class
 */
interface iPasteIConstants
{
    const OK = "OK";
    const KO = "KO";
}

/**
 * Class iPasteIColor
 * valid values for color variable
 */
interface iPasteIValidColours
{
    const DEF = "default";
    const RED = "red";
    const BLUE = "blue";
    const GREEN = "green";
    const YELLOW = "yellow";
    const ORANGE = "orange";
}

/**
 * Class iPasteIExpiryDate
 * Valid values for expiryDate variable
 */
interface iPasteIValidExpiryDates
{
    /* Minutes */
    const ONE_MINUTE = "1 MINUTE";
    const FIVE_MINUTES = "5 MINUTE";
    const TEN_MINUTES = "10 MINUTE";
    const THIRTY_MINUTES = "30 MINUTE";
    /* Hours */
    const ONE_HOUR = "1 HOUR";
    const SIX_HOURS = "6 HOUR";
    const TWELVE_HOURS = "12 HOUR";
    /* Days */
    const ONE_DAY = "1 DAY";
    const SEVEN_DAYS = "7 DAY";
    const FOURTEEN_DAYS = "14 DAY";
    /* Months */
    const ONE_MONTH = "1 MONTH";
    /* Years */
    const ONE_YEAR = "1 YEAR";
    const FIVE_YEARS = "5 YEAR";
    const TEN_YEARS = "10 YEAR";
    const ONE_HUNDRED_YEARS = "100 YEAR";
    const ONE_THOUSAND_YEARS = "1000 YEAR";

}

/**
 * Class iPasteIResponseListFormat
 * Valida responses for the public function getUserPastes(...)
 */
interface iPasteIResponseListFormat
{
    const TEXT = "text";
    const RAW = "text";
    const JSON = "json";
}

/**
 * Class iPasteIResponsePasteFormat
 * Valid responses for the public function get(...)
 */
interface iPasteIResponsePasteFormat extends iPasteIResponseListFormat
{
    const HTML = "html";
    const XML = "xml";
    const YAML = "yaml";
}

/**
 * Class iPasteIStatus
 * Valid values for status variable
 */
interface iPasteIValidStatuses
{
    const LISTED = "listed";
    const NOT_LISTED = "hidden";
    const VISIBLE = "listed";
    const HIDDEN = "hidden";
}

/**
 * Class iPasteIValidSyntaxes
 * Valid paste syntaxes.
 *
 */
interface iPasteIValidSyntaxes
{
    const GADV_4CS = "4cs";
    const MOS_6502_6510_ACME_CROSS_ASSEMBLER_FORMAT = "6502acme";
    const MOS_6502_6510_KICK_ASSEMBLER_FORMAT = "6502kickass";
    const MOS_6502_6510_TASM_64TASS_ASSEMBLER_FORMAT = "6502tasm";
    const MOTOROLA_68000_HISOFT_DEVPAC_STR_ASSEMBLER_FORMAT = "68000devpac";
    const ABAP = "abap";
    const ACTION_SCRIPT = "actionscript";
    const ACTION_SCRIPT3 = "actionscript3";
    const ADA = "ada";
    const ALGOL_68 = "algol68";
    const APACHE_CONFIGURATION = "apache";
    const HTACCESS = "apache";
    const APPLE_SCRIPT = "applescript";
    const APT_SOURCE = "apt_sources";
    const ARDUINO = "arduino";
    const ASM = "asm";
    const ASP = "asp";
    const AUTOCONF = "autoconf";
    const AUTOHOTKEY = "autohotkey";
    const AUTOIT = "autoit";
    const AVI_SYNTH = "avisynth";
    const AWK = "awk";
    const BASCOM_AVR = "bascomavr";
    const BASH = "bash";
    const BASIC4GL = "basic4gl";
    const BBCODE = "bbcode";
    const BRAINFUCK = "bf";
    const BIBTEX = "bibtex";
    const BLITZ_BASIC = "blitzbasic";
    const BNF = "bnf";
    const BOO = "boo";
    const C = "c";
    const C_LOAD_RUNNER = "c_loadrunner";
    const C_MAC = "c_mac";
    const CAD_DCL = "caddcl";
    const CAD_LISP = "cadlisp";
    const CFDG = "cfdg";
    const COLD_FUSION = "cfm";
    const CHAI_SCRIPT = "chaiscript";
    const CIL = "cil";
    const CLOJURE = "clojure";
    const CMAKE = "cmake";
    const COBOL = "cobol";
    const COFFEE_SCRIPT = "coffeescript";
    const CPP = "cpp";
    const CPP_QT = "cpp - qt";
    const C_SHARP = "csharp";
    const CSS = "css";
    const CUESHEET = "cuesheet";
    const D = "d";
    const DCL = "dcl";
    const DCS = "dcs";
    const DELPHI = "delphi";
    const DIFF = "diff";
    const DIV = "div";
    const DOS = "dos";
    const DOT = "dot";
    const E = "e";
    const ECMA_SCRIPT = "ecmascript";
    const EIFFEL = "eiffel";
    const EMAIL_MBOX = "email";
    const EPC = "epc";
    const ERLANG = "erlang";
    const EUPHORIA = "euphoria";
    const FORMULA_ONE = "f1";
    const FALCON = "falcon";
    const FO_ABAS_ERP = "fo";
    const FORTRAN = "fortran";
    const FREEBASIC = "freebasic";
    const F_SHARP = "fsharp";
    const GAMBAS = "gambas";
    const GDB = "gdb";
    const GENERO = "genero";
    const GENIE = "genie";
    const GNU_GETTEX = "gettext";
    const GLSLAG = "glsl";
    const GML = "gml";
    const GAME_MAKER_LANGUAGE = "gml";
    const GNUPLOT = "gnuplot";
    const GO = "go";
    const GROOVY = "groovy";
    const GW_BASIC = "gwbasic";
    const HASKELL = "haskell";
    const HIC_EST = "hicest";
    const HQ9_PLUS = "hq9plus";
    const HTML_4_STRICT = "html4strict";
    const HTML_5 = "html5";
    const ICON = "icon";
    const UNO_IDL = "idl";
    const INI = "ini";
    const INNO = "inno";
    const INTERCAL = "intercal";
    const IO = "io";
    const J = "j";
    const JAVA = "java";
    const JAVA_SE_5 = "java5";
    const JAVA_SCRIPT = "javascript";
    const JQUERY = "jquery";
    const KI_XTART = "kixtart";
    const KLONE_C = "klonec";
    const KLONE_CPP = "klonecpp";
    const LATEX = "latex";
    const LIBERTY_BASIC = "lb";
    const LDIF = "ldif";
    const LISP = "lisp";
    const LLVM_INTEMEDIATE_REPRESENTATION = "llvm";
    const LOCOMOTIVE_BASIC = "locobasic";
    const LOGTALK = "logtalk";
    const LOL_CODE = "lolcode";
    const LOTUS_NOTES_FORMULAS = "lotusformulas";
    const LOTUS_SCRIPT = "lotusscript";
    const L_SCRIPT = "lscript";
    const LSL2 = "lsl2";
    const LUA = "lua";
    const MOTOROLA_6800_ASSEMBLER = "m68k";
    const MAGIK_SF = "magiksf";
    const GNU_MAKE = "make";
    const MAP_BASIC = "mapbasic";
    const MATLAB_M = "matlab";
    const MIRC_SCRIPTING = "mirc";
    const MMIX = "mmix";
    const MODULA_2 = "modula2";
    const MODULA_3 = "modula3";
    const MICROCHIP_ASSEMBLER = "mpasm";
    const MXML = "mxml";
    const MYSQL = "mysql";
    const NEWLISP = "newlisp";
    const NSIS = "nsis";
    const OBERON_2 = "oberon2";
    const OBJECTIVE_C = "objc";
    const OBJECK_PROGRAMMING_LANGUAGE = "objeck";
    const OCAML = "ocaml";
    const OCAML_BRIEF = "ocaml - brief";
    const OPEN_OFFICE_ORG_BASIC = "oobas";
    const ORACLE_11_SQL = "oracle11";
    const ORACLE_8_SQL = "oracle8";
    const OXYGENE_DELPHI_PRISM = "oxygene";
    const OZ = "oz";
    const PARI_GP = "parigp";
    const PASCAL = "pascal";
    const PCRE = "pcre";
    const PER = "per";
    const PERL = "perl";
    const PERL_6 = "perl6";
    const OPEN_BSD_PACKET_FILTER = "pf";
    const PHP = "php";
    const PHP_BRIEF = "php - brief";
    const PIC16 = "pic16";
    const PIKE = "pike";
    const PIXEL_BENDER_1 = "pixelbender";
    const PL_I = "pli";
    const PL_SQL = "plsql";
    const POSTGREE_SQL = "postgresql";
    const POST_SCRIPT = "PostScript";
    const POVRAY = "povray";
    const POWER_BUILDER = "powerbuilder";
    const POWER_SHELL = "powershell";
    const PROFTPD_CONFIGURATION = "proftpd";
    const PROGRESS = "progress";
    const PROLOG = "prolog";
    const PROPERTIES = "properties";
    const PROVIDEX = "providex";
    const PURE_BASIC = "purebasic";
    const PYTHON_CONSOLE_MODE = "pycon";
    const PYTHON = "python";
    const Q = "q";
    const KDB_PLUS = "q";
    const QBASIC = "qbasic";
    const QUICKBASIC = "qbasic";
    const RAILS = "rails";
    const REBOL = "rebol";
    const MICROSOFT_REGISTRY = "reg";
    const ROBOTS_TXT = "robots";
    const RPM_SPECIFICATION_FILE = "rpmspec";
    const R = "rsplus";
    const S_PLUS = "rsplus";
    const RUBY = "ruby";
    const SAS = "sas";
    const SCALA = "scala";
    const SCHEME = "scheme";
    const SCI_LAB = "scilab";
    const SDL_BASIC = "sdlbasic";
    const SMALLTALK = "smalltalk";
    const SMARTY = "smarty";
    const SPARK = "spark";
    const SQL = "sql";
    const STONE_SCRIPT = "stonescript";
    const SYSTEM_VERILOG = "systemverilog";
    const TCL = "tcl";
    const TERA_TERM_MACRO = "teraterm";
    const TEXT = "text";
    const THIN_BASIC = "thinbasic";
    const T_SQL = "tsql";
    const TYPO_SCRIPT = "typoscript";
    const UNICON_UNIFIED_EXTENDED_DIALECT_OF_ICON = "unicon";
    const UPC = "upc";
    const UNREAL_SCRIPT = "uscript";
    const VALA = "vala";
    const VISUAL_BASIC = "vb";
    const VISUAL_BASIC_DOT_NET = "vbnet";
    const VERILOG = "verilog";
    const VHDL = "vhdl";
    const VIM_SCRIPT = "vim";
    const VISUAL_FOX_PRO = "visualfoxpro";
    const VISUAL_PRO_LOG = "visualprolog";
    const WHITE_SPACE = "whitespace";
    const WHOIS_RPSQL_FORMAT = "whois";
    const WINBATCH = "winbatch";
    const X_BASIC = "xbasic";
    const XML = "xml";
    const XORG_CONFIGURATION = "xorg_conf";
    const XPP = "xpp";
    const YAML = "yaml";
    const ZILOG_Z80_ASSEMBLER = "z80";
    const ZX_BASIC = "zxbasic";
    const ITALIAN = "italian";
    const ENGLISH = "english";
    const FRENCH = "French";
    const SPANISH = "spanish";
}

/**
 * Class iPaste
 * iPaste API core. You should instantiate this class in order to be abble to make requests to the iPaste.eu platform.
 */
class iPaste implements iPasteICore
{
    // Developer key which will identify the software developer developer
    private $devKey;
    // User's username
    private $username;
    // User's password
    private $password;
    // Temporary key, used to get access to the main api functions
    // The temporary key is the session key.
    private $tmpKey;
    // some functions will try to reconnect, by using recursive calls, if the tmpKey expired, this variable counts
    // the number of attempts of automatic login and avoids the infinite loop
    private $reconnections;

    /**
     * Initialize class variables.
     * @param string $devKey you developer key
     * @param string $username user's username
     * @param string $password user's password
     */
    function __construct($devKey = null, $username = null, $password = null)
    {
        $this->devKey = $devKey;
        $this->username = md5(strtoupper($username));
        $this->password = md5($password);
        $this->reconnections = 0;
        // automatic login
        $this->login();
    }

    /**
     * User login
     * @param null $devKey
     * @param null $username
     * @param null $password
     * @return mixed
     */
    public function login($devKey = null, $username = null, $password = null)
    {
        $this->reconnections = 0;
        if (!empty($devKey) && !empty($username) && !empty($password)) {
            $this->devKey = $devKey;
            $this->username = md5(strtoupper($username));
            $this->password = md5($password);
        }

        if (empty($this->devKey) || empty($this->username) || empty($this->password))
            return KO;

        $response = $this->call('act=login&a=' . urlencode($this->devKey) . urlencode($this->username) . urlencode($this->password));
        if ($this->isError($response))
            return $response;
        $this->tmpKey = $response;
        return $response;
    }

    /**
     * @param string $param
     * @return mixed
     */
    private function call($param)
    {
        $url = 'http://www.ipaste.eu/api';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_NOBODY, 0);
        return curl_exec($ch);
    }

    /**
     * @param $response
     * @return string
     */
    private function isError($response)
    {
        return strstr($response, "-");
    }

    /**
     * Returns the paste list of the logged-in user or if you pass a username, returns the list of pastes of that user.
     * Like in other action functions (insert, remove etc.), tmpKey is optional (because the login function will store
     * automatically the temporary key in an instance variable)
     * @param string $format
     * @param string $username
     * @param string $tmpKey
     * @return string mixed
     * @throws iPasteException
     */
    public function getUserPastes($format = iPasteIResponseListFormat::JSON, $username = null, $tmpKey = null)
    {
        $this->setAndValidateTmpKey($tmpKey);
        $this->validateField($format, "iPasteIResponseListFormat");
        if (!empty($username) && strlen($username) > 32)
            throw new iPasteException("KO - Invalid username");

        $query = "act=get_all_user_pastes&frm=$format&a=" . $this->tmpKey;
        if (!empty($username))
            $query .= "&uid=$username";
        $response = $this->call($query);

        /**
         * If we have an expired tmpKey, we try to get a new one by making a new login.
         * Another attempt to get users pastes will be made.
         */
        if ($this->automaticLogin($response))
            return $this->getUserPastes($format, $username);
        return $response;
    }

    /**
     * Updates the temporary key with the, possibly, new value passed as parameter.
     * @param null $tmpKey
     * @throws iPasteException
     */
    private function setAndValidateTmpKey($tmpKey = null)
    {
        if (!empty($tmpKey)) {
            $this->tmpKey = $tmpKey;
        }
        if (empty($this->tmpKey))
            throw new iPasteException("The temporary key is required.");
    }

    /**
     * @param $field
     * @param $constantsInterface
     * @throws iPasteException
     */
    private function validateField($field, $constantsInterface)
    {
        $reflection = new ReflectionClass($constantsInterface);
        $constants = $reflection->getConstants();
        $in = in_array($field, $constants, FALSE);
        if (!empty($tmp) && $in === FALSE)
            throw new iPasteException("Invalid field value. Please refer to $constantsInterface constants.");
    }

    /**
     * If response returned a KO, this means perhaps that the tmpKey expired, so that, here, we try to make an automatic login.
     * We must be careful to avoid infinite loop.
     * The first condition is that the new retrieved tmpKey should be different from the old one,
     * this guarantees to us that, for some reasons, the server is not sending us an expired tmpKey.
     * The second condition is that the reconnections counter should be repeated one time, in order to avoid
     * infinite recursion, so that infinite loops.
     * @param $response
     * @return bool true if we have a new tmpKey
     */
    private function automaticLogin($response)
    {
        //return false;

        if ($this->isError($response) && ($response === "KO - Invalid tmpKey") && $this->reconnections < 1) {
            // sleep for 5 seconds and the retry to loggin
            sleep(5);
            $oldTmpKey = $this->tmpKey;
            $newTmpKey = $this->login();
            if ($oldTmpKey !== $newTmpKey) {
                $this->reconnections++;
                return TRUE;
            }
        }
        return FALSE;

    }

    /**
     * Update user paste.
     * @param iPastePaste $paste
     * @param null $tmpKey
     * @return mixed
     */
    public function update(iPastePaste $paste, $tmpKey = null)
    {
        // we don't want to waste the API user instance
        $paste = clone $paste;
        // throws an exception if it encounters something wrong
        $this->setAndValidateTmpKey($tmpKey);
        // throws an exception if it encounters something wrong
        $this->validatePasteBeforeUpdate($paste);

        $query = 'act=update' .
            '&a=' . urlencode($this->tmpKey) .
            '&id=' . urlencode($paste->getId()) .
            '&pasteTitle=' . urlencode($paste->getTitle());
        $pasteDescription = $paste->getDescription();
        if (!empty($pasteDescription))
            $query .= '&pasteDescription=' . urlencode($pasteDescription);
        $query .= '&pasteContent=' . urlencode($paste->getContent());
        $pasteStatus = $paste->getStatus();
        if (!empty($pasteStatus))
            $query .= '&pasteStatus=' . urlencode($pasteStatus);

        $pastePassword = $paste->getPassword();
        if (!empty($pastePassword))
            $query .= '&c=' . urlencode($pastePassword);

        $pasteSource = $paste->getSource();
        if (!empty($pasteSource))
            $query .= '&pasteSource=' . urlencode($pasteSource);

        $pasteTags = $paste->getTags();
        if (!empty($pasteTags))
            $query .= '&pasteTags=' . urlencode($pasteTags);

        $pasteExpiryDate = $paste->getExpiryDate();
        if (!empty($pasteExpiryDate))
            $query .= '&pasteExpiryDate=' . urlencode($pasteExpiryDate);

        $pasteSyntax = $paste->getSyntax();
        if (!empty($pasteSyntax))
            $query .= '&pasteSyntax=' . urlencode($pasteSyntax);

        $pasteColour = $paste->getColor();
        if (!empty($pasteColour))
            $query .= '&pasteColor=' . urlencode($pasteColour);


        $response = $this->call($query);
        /**
         * If we have an expired tmpKey, we try to get a new one by making a new login.
         * Another attempt to publish a paste will be made.
         */
        if ($this->automaticLogin($response))
            return $this->update($paste);
        return ((int)$response === (int)$paste->getId());
    }

    /**
     * Paste validation: before update
     * @param iPastePaste $paste
     * @return string
     * @throws iPasteException
     */
    private function validatePasteBeforeUpdate(iPastePaste $paste)
    {
        // alters some fields like password, which must be hashed before sending request.
        // rendondant.
        //$this->pastePreProcess($paste);
        // it throws an exception
        $this->validatePasteBeforeInsert($paste);
        $pasteId = $paste->getId();
        if (empty($pasteId) || !is_numeric($pasteId) || strlen($pasteId) > 10)
            throw new iPasteException("KO - Invalid paste ID");
        // OOK! :)
        return OK;
    }

    /**
     * Paste validation: befor insert
     * @param iPastePaste $paste
     * @return string
     * @throws iPasteException
     */
    private function validatePasteBeforeInsert(iPastePaste $paste)
    {
        // alters some fields like password, which must be hashed before sending request
        $this->pastePreProcess($paste);

        $pasteTitle = $paste->getTitle();
        $pastePaste = $paste->getContent();
        $pastePassword = $paste->getPassword();
        $pasteSource = $paste->getSource();
        $pasteTags = $paste->getTags();
        $pasteDescription = $paste->getDescription();

        // required
        if (empty($pasteTitle) || strlen($pasteTitle) > 500)
            throw new iPasteException("KO - Invalid paste title");
        // required
        if (empty($pastePaste) || strlen($pastePaste) > 16777215)
            throw new iPasteException("KO - Invalid paste content");
        // optional
        if (!empty($pastePassword) && strlen($pastePassword) !== 32)
            throw new iPasteException("KO - Invalid paste password (" . strlen($pastePassword) . ")");
        // optional
        if (!empty($pasteSource) && strlen($pasteSource) > 500)
            throw new iPasteException("KO - Invalid paste source");
        // optional
        if (!empty($pasteTags) && strlen($pasteTags) > 10000)
            throw new iPasteException("KO - Invalid paste tags");
        // optional
        if (!empty($pasteDescription) && strlen($pasteDescription) > 5000)
            throw new iPasteException("KO - Invalid paste description");
        // required
        $this->validateField($paste->getStatus(), "iPasteIValidStatuses");
        // required
        $this->validateField($paste->getExpiryDate(), "iPasteIValidExpiryDates");
        // required
        $this->validateField($paste->getSyntax(), "iPasteIValidSyntaxes");
        // required
        $this->validateField($paste->getColor(), "iPasteIValidColours");
        // OOK! :)
        return OK;
    }

    /**
     * Alters some fields in order to make possible a valid request
     * @param iPastePaste $paste
     */
    private function pastePreProcess(iPastePaste $paste)
    {
        $pastePassword = $paste->getPassword();
        if (!empty($pastePassword))
            $paste->setPassword(md5($paste->getPassword()));
    }

    /**
     * Publish a paste
     * @param iPastePaste $paste
     * @param null $tmpKey
     * @return mixed
     */
    public function paste(iPastePaste $paste, $tmpKey = null)
    {
        // we don't want to waste the API user paste instance
        $paste = clone $paste;
        // throws an exception if it encounters something wrong
        $this->setAndValidateTmpKey($tmpKey);
        // throws an exception if it encounters something wrong
        $this->validatePasteBeforeInsert($paste);
        $query = 'act=insert' .
            '&a=' . urlencode($this->tmpKey) .
            '&pasteTitle=' . urlencode($paste->getTitle());
        $pasteDescription = $paste->getDescription();
        if (!empty($pasteDescription))
            $query .= '&pasteDescription=' . urlencode($pasteDescription);
        $query .= '&pasteContent=' . urlencode($paste->getContent());
        $pasteStatus = $paste->getStatus();
        if (!empty($pasteStatus))
            $query .= '&pasteStatus=' . urlencode($pasteStatus);

        $pastePassword = $paste->getPassword();
        if (!empty($pastePassword))
            $query .= '&c=' . urlencode($pastePassword);

        $pasteSource = $paste->getSource();
        if (!empty($pasteSource))
            $query .= '&pasteSource=' . urlencode($pasteSource);

        $pasteTags = $paste->getTags();
        if (!empty($pasteTags))
            $query .= '&pasteTags=' . urlencode($pasteTags);

        $pasteExpiryDate = $paste->getExpiryDate();
        if (!empty($pasteExpiryDate))
            $query .= '&pasteExpiryDate=' . urlencode($pasteExpiryDate);

        $pasteSyntax = $paste->getSyntax();
        if (!empty($pasteSyntax))
            $query .= '&pasteSyntax=' . urlencode($pasteSyntax);

        $pasteColour = $paste->getColor();
        if (!empty($pasteColour))
            $query .= '&pasteColor=' . urlencode($pasteColour);


        $response = $this->call($query);
        /**
         * If we have an expired tmpKey, we try to get a new one by making a new login.
         * Another attempt to publish a paste will be made.
         */
        if ($this->automaticLogin($response))
            return $this->paste($paste);
        return $response;
    }

    /**
     * Remove user paste
     * @param $pasteId
     * @param null $tmpKey
     * @return mixed
     * @throws iPasteException
     */
    public function remove($pasteId, $tmpKey = null)
    {
        // throws an exception if it encounters something wrong
        $this->setAndValidateTmpKey($tmpKey);
        // $pasteId validation
        if (empty($pasteId) || !is_numeric($pasteId) || strlen($pasteId) > 10)
            throw new iPasteException("KO - Invalid paste ID");

        $response = $this->call('act=remove' .
        '&a=' . urlencode($this->tmpKey) .
        '&id=' . urlencode($pasteId));
        if ($this->automaticLogin($response))
            return $this->remove($pasteId);
        return ($response === "OK");
    }

    /**
     * Returns the temporary key
     * @return string mixed temporary key
     */
    public function getTmpKey()
    {
        return $this->tmpKey;
    }

    /**
     * @return null|string
     */
    public function getDevKey()
    {
        return $this->devKey;
    }

    /**
     * @param null|string $devKey
     */
    public function setDevKey($devKey)
    {
        $this->devKey = $devKey;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Returns a paste, by default, in JSON format
     * @param $pasteId
     * @param string $format
     * @param null $tmpKey
     * @return mixed
     * @throws iPasteException
     */
    public function get($pasteId, $format = iPasteIResponsePasteFormat::JSON, $tmpKey = null)
    {
        $this->setAndValidateTmpKey($tmpKey);
        if (empty($pasteId) || !is_numeric($pasteId) || strlen($pasteId) > 10)
            throw new iPasteException("KO - Invalid paste ID (is_numeric: " . (is_numeric($pasteId) ? "TRUE" : "FALSE") . ", empty: " . (empty($pasteId) ? "TRUE" : "FALSE") . ", strlen($pasteId) > 10: " . (strlen($pasteId) > 10 ? "TRUE" : "FALSE") . ")");
        $this->validateField($format, "iPasteIResponsePasteFormat");
        $response = $this->call("act=get" .
        "&a=" . urlencode($this->tmpKey) .
        "&id=" . urlencode($pasteId) .
        "&frm=" . urlencode($format));
        if ($this->automaticLogin($response))
            return $this->get($pasteId, $format);
        return $response;
    }
}

/**
 * Class iPasteException
 */
class iPasteException extends Exception
{
    public function __construct($message = "iPasteException", $code = 1)
    {
        parent::__construct($message, $code);
    }
}

/**
 * Class iPastePaste
 * Paste bean
 */
class iPastePaste
{
    /**
     * use it only for update actions
     * @var int
     */
    private $id;
    /**
     * min_length: 1 character
     * max_length: 500 characters
     * @var string
     */
    private $title;
    /**
     * min_length: 1 character
     * max_length: 16.777.215 characters
     * @var string
     */
    private $content;
    /**
     * @see iPasteIStatus for valid values
     * @var string
     */
    private $status;
    /**
     * min_length: 32 character (md5)
     * max_length: 32 characters (md5)
     * @var string
     */
    private $password;
    /**
     * min_length: 1 character
     * max_length: 500 characters
     * @var string
     */
    private $source;
    /**
     * min_length: 1 character
     * max_length: 10000 characters
     * must be separated by comma (,)
     * @var string
     */
    private $tags;
    /**
     * min_length: 1 character
     * max_length: 5000 characters
     * @var string
     */
    private $description;
    /**
     * @see iPasteIExpiryDate for valid values
     * @var string
     */
    private $expiryDate;
    /**
     * @see iPasteISyntax
     * @var string
     */
    private $syntax;
    /**
     * @see iPasteIColor for valid values
     * @var string
     */
    private $color;

    /**
     * @param $id
     * @param $title
     * @param string $description
     * @param $content
     * @param string $status
     * @param string $password
     * @param string $source
     * @param string $tags
     * @param string $expiryDate
     * @param string $syntax
     * @param string $color
     */
    public function __construct($id, $title, $description = "", $content, $status = "", $password = "", $source = "", $tags = "", $expiryDate = "", $syntax = "", $color = "")
    {
        $this->color = $color;
        $this->description = $description;
        $this->expiryDate = $expiryDate;
        $this->password = $password;
        $this->content = $content;
        $this->id = $id;
        $this->source = $source;
        $this->status = $status;
        $this->syntax = $syntax;
        $this->tags = $tags;
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * @return mixed
     */
    public function getExpiryDate()
    {
        return $this->expiryDate;
    }

    /**
     * @param mixed $expiryDate
     */
    public function setExpiryDate($expiryDate)
    {
        $this->expiryDate = $expiryDate;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param mixed $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getSyntax()
    {
        return $this->syntax;
    }

    /**
     * @param mixed $syntax
     */
    public function setSyntax($syntax)
    {
        $this->syntax = $syntax;
    }

    /**
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param mixed $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


}