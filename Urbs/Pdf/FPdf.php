<?php

require ($_SERVER['DOCUMENT_ROOT'] . "/Geral/classes/Fpdf/fpdf.php");

class Urbs_Pdf_FPdf extends FPDF
{

    // ################################# Initialization

    var $wLine; // Maximum width of the line
    var $hLine; // Height of the line
    var $Text; // Text to display
    var $border;
    var $align; // Justification of the text
    var $fill;
    var $Padding;
    var $lPadding;
    var $tPadding;
    var $bPadding;
    var $rPadding;
    var $TagStyle; // Style for each tag
    var $Indent;
    var $Space; // Minimum space between words
    var $PileStyle;
    var $Line2Print; // Line to display
    var $NextLineBegin; // Buffer between lines
    var $TagName;
    var $Delta; // Maximum width minus width
    var $StringLength;
    var $LineLength;
    var $wTextLine; // Width minus paddings
    var $nbSpace; // Number of spaces in the line
    var $Xini; // Initial position
    var $href; // Current URL
    var $TagHref; // URL for a cell
    var $widths;
    var $aligns;    

    // ################################# Public Functions
    
    
    //########## Adicionado em 30/01/2014
    //########## Por André Slompo
    //########## Tratamento de MultiCells
    //O vetor de alinhamento, largura e dados deve ter  a mesma quantidade de
    //elementos, e tmbm a mesma dimensão (2).
    
        /**
         * Seta o vetor de lagura das multicells
         * @param array $w
         */
        function SetWidths($w)
        {
            //array para setar as colunas
            $this->widths=$w;
        }
        /**
         * Seta o vetor de alinhamento das multicells 
         * @param array $a
         */
        function SetAligns($a){
            //array para mostrar todos os alinhamentos
            $this->aligns=$a;
        }
        /**
         * Retorna o vetor de larguras
         * @return Array
         */
        function GetWidths(){
            return $this->widths;
        }
        /**
         * Retorna o vetor de alinhamentos
         * @return Array
         */
        function GetAligns(){
            return $this->aligns;
        }
        /**
         * Essa função imprime diversas multicells como se fossem cells
         * @param Array $data Os dados que serão impressos ordenados por coluna
         * @param integer $heigth  Altura das linhas da multicell
         * @param integer $border 1 se possui border, 0 se não possui
         */
        function Row($data, $heigth = 5, $border = 1){
            //se der problema trocar por heigth por 5
            //Calcular a altura do row
            $nb=0;
            for($i=0;$i<count($data);$i++)
                $nb=max($nb, $this->NbLines($this->widths[$i], $data[$i]));
            $h=$heigth*$nb;
            //Quebrar a página se necessário
            $this->CheckPageBreak($h);
            //Desenhar as linhas dos rows
            for($i=0;$i<count($data);$i++){
                $w=$this->widths[$i];
                $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
                //Salvar posição corrente
                $x=$this->GetX();
                $y=$this->GetY();
                //Desenhar as bordas
                if ($border){
                    $this->Rect($x, $y, $w, $h);
                }
                //Imprimir o texto
                $this->MultiCell($w, $heigth, $data[$i], 0, $a);
                //Por a posição a direita da celula
                $this->SetXY($x+$w, $y);
            }
            //Ir para a proxima linha
            $this->Ln($h);
        }
        /**
         * Função interna para verificar se existe ou não quebra de página
         * @param int $h
         */
        function CheckPageBreak($h){
            //Se a altura H causar um overflow, adiciona
            //uma nova página imediatamente
            if($this->GetY()+$h>$this->PageBreakTrigger)
                $this->AddPage($this->CurOrientation);
        }
        /**
         * Função de uso interno, calcula quantas linhas cada multicell
         * @param integer $w largura
         * @param string $txt dados a serem impressos
         * @return int
         */
        function NbLines($w, $txt){
            //Calcula o número de numeros de linhas que
            //a multicell de largura w usará.
            $cw=&$this->CurrentFont['cw'];
            if($w==0)
                $w=$this->w-$this->rMargin-$this->x;
            $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
            $s=str_replace("\r", '', $txt);
            $nb=strlen($s);
            if($nb>0 and $s[$nb-1]=="\n")
                $nb--;
            $sep=-1;
            $i=0;
            $j=0;
            $l=0;
            $nl=1;
            while($i<$nb)
            {
                $c=$s[$i];
                if($c=="\n")
                {
                    $i++;
                    $sep=-1;
                    $j=$i;
                    $l=0;
                    $nl++;
                    continue;
                }
                if($c==' ')
                    $sep=$i;
                $l+=$cw[$c];
                if($l>$wmax)
                {
                    if($sep==-1)
                    {
                        if($i==$j)
                            $i++;
                    }
                    else
                        $i=$sep+1;
                    $sep=-1;
                    $j=$i;
                    $l=0;
                    $nl++;
                }
                else
                    $i++;
            }
            return $nl;
        }    
    
    // ################### FIM ADIÇÃO 30/01/2014
    

    public function __construct( $p1 = 'P', $p2 = 'mm', $p3 = 'A4' )
    {
        //chama o construtor do FPDF
        parent::__construct( $p1, $p2, $p3 );
    }

    function WriteTag( $w, $h, $txt, $border=0, $align="J", $fill=0, $padding=0 )
    {
        $this->wLine = $w;
        $this->hLine = $h;
        $this->Text = trim( $txt );
        $this->Text = ereg_replace( "\n|\r|\t", "", $this->Text );
        $this->border = $border;
        $this->align = $align;
        $this->fill = $fill;
        $this->Padding = $padding;

        $this->Xini = $this->GetX();
        $this->href = "";
        $this->PileStyle = array();
        $this->TagHref = array();
        $this->LastLine = false;

        $this->SetSpace();
        $this->Padding();
        $this->LineLength();
        $this->BorderTop();

        while ( $this->Text != "" )
        {
            $this->MakeLine();
            $this->PrintLine();
        }

        $this->BorderBottom();
    }

    function DefStyle( $tag, $family, $style, $size, $color, $indent=-1 )
    {
        $tag = trim( $tag );
        $this->TagStyle[$tag]['family'] = trim( $family );
        $this->TagStyle[$tag]['style'] = trim( $style );
        $this->TagStyle[$tag]['size'] = trim( $size );
        $this->TagStyle[$tag]['color'] = trim( $color );
        $this->TagStyle[$tag]['indent'] = $indent;
    }

    // ############################ Private Functions

    function SetSpace() // Minimal space between words
    {
        $tag = $this->Parser( $this->Text );
        $this->FindStyle( $tag[2], 0 );
        $this->DoStyle( 0 );
        $this->Space = $this->GetStringWidth( " " );
    }

    function Padding()
    {
        if ( ereg( "^.+, ", $this->Padding ) )
        {
            $tab = explode( ", ", $this->Padding );
            $this->lPadding = $tab[0];
            $this->tPadding = $tab[1];
            if ( isset( $tab[2] ) )
                $this->bPadding = $tab[2];
            else
                $this->bPadding = $this->tPadding;
            if ( isset( $tab[3] ) )
                $this->rPadding = $tab[3];
            else
                $this->rPadding = $this->lPadding;
        }
        else
        {
            $this->lPadding = $this->Padding;
            $this->tPadding = $this->Padding;
            $this->bPadding = $this->Padding;
            $this->rPadding = $this->Padding;
        }
        if ( $this->tPadding < $this->LineWidth )
            $this->tPadding = $this->LineWidth;
    }

    function LineLength()
    {
        if ( $this->wLine == 0 )
            $this->wLine = $this->fw - $this->Xini - $this->rMargin;

        $this->wTextLine = $this->wLine - $this->lPadding - $this->rPadding;
    }

    function BorderTop()
    {
        $border = 0;
        if ( $this->border == 1 )
            $border = "TLR";
        $this->Cell( $this->wLine, $this->tPadding, "", $border, 0, 'C', $this->fill );
        $y = $this->GetY() + $this->tPadding;
        $this->SetXY( $this->Xini, $y );
    }

    function BorderBottom()
    {
        $border = 0;
        if ( $this->border == 1 )
            $border = "BLR";
        $this->Cell( $this->wLine, $this->bPadding, "", $border, 0, 'C', $this->fill );
    }

    function DoStyle( $tag ) // Applies a style
    {
        $tag = trim( $tag );
        $this->SetFont( $this->TagStyle[$tag]['family'], $this->TagStyle[$tag]['style'], $this->TagStyle[$tag]['size'] );

        $tab = explode( ", ", $this->TagStyle[$tag]['color'] );
        if ( count( $tab ) == 1 )
            $this->SetTextColor( $tab[0] );
        else
            $this->SetTextColor( $tab[0], $tab[1], $tab[2] );
    }

    function FindStyle( $tag, $ind ) // Inheritance from parent elements
    {
        $tag = trim( $tag );

        // Family
        if ( $this->TagStyle[$tag]['family'] != "" )
            $family = $this->TagStyle[$tag]['family'];
        else
        {
            reset( $this->PileStyle );
            while ( list($k, $val) = each( $this->PileStyle ) )
            {
                $val = trim( $val );
                if ( $this->TagStyle[$val]['family'] != "" )
                {
                    $family = $this->TagStyle[$val]['family'];
                    break;
                }
            }
        }

        // Style
        $style1 = strtoupper( $this->TagStyle[$tag]['style'] );
        if ( $style1 == "N" )
            $style = "";
        else
        {
            reset( $this->PileStyle );
            while ( list($k, $val) = each( $this->PileStyle ) )
            {
                $val = trim( $val );
                $style1 = strtoupper( $this->TagStyle[$val]['style'] );
                if ( $style1 == "N" )
                    break;
                else
                {
                    if ( ereg( "B", $style1 ) )
                        $style['b'] = "B";
                    if ( ereg( "I", $style1 ) )
                        $style['i'] = "I";
                    if ( ereg( "U", $style1 ) )
                        $style['u'] = "U";
                }
            }
            $style = $style['b'] . $style['i'] . $style['u'];
        }

        // Size
        if ( $this->TagStyle[$tag]['size'] != 0 )
            $size = $this->TagStyle[$tag]['size'];
        else
        {
            reset( $this->PileStyle );
            while ( list($k, $val) = each( $this->PileStyle ) )
            {
                $val = trim( $val );
                if ( $this->TagStyle[$val]['size'] != 0 )
                {
                    $size = $this->TagStyle[$val]['size'];
                    break;
                }
            }
        }

        // Color
        if ( $this->TagStyle[$tag]['color'] != "" )
            $color = $this->TagStyle[$tag]['color'];
        else
        {
            reset( $this->PileStyle );
            while ( list($k, $val) = each( $this->PileStyle ) )
            {
                $val = trim( $val );
                if ( $this->TagStyle[$val]['color'] != "" )
                {
                    $color = $this->TagStyle[$val]['color'];
                    break;
                }
            }
        }

        // Result
        $this->TagStyle[$ind]['family'] = $family;
        $this->TagStyle[$ind]['style'] = $style;
        $this->TagStyle[$ind]['size'] = $size;
        $this->TagStyle[$ind]['color'] = $color;
        $this->TagStyle[$ind]['indent'] = $this->TagStyle[$tag]['indent'];
    }

    function Parser( $text )
    {
        $tab = array();
        // Closing tag
        if ( ereg( "^(</([^>]+)>).*", $text, $regs ) )
        {
            $tab[1] = "c";
            $tab[2] = trim( $regs[2] );
        }
        // Opening tag
        else if ( ereg( "^(<([^>]+)>).*", $text, $regs ) )
        {
            $regs[2] = ereg_replace( "^a", "a ", $regs[2] );
            $tab[1] = "o";
            $tab[2] = trim( $regs[2] );

            // Presence of attributes
            if ( ereg( "(.+) (.+)='(.+)' *", $regs[2] ) )
            {
                $tab1 = split( " +", $regs[2] );
                $tab[2] = trim( $tab1[0] );
                while ( list($i, $couple) = each( $tab1 ) )
                {
                    if ( $i > 0 )
                    {
                        $tab2 = explode( "=", $couple );
                        $tab2[0] = trim( $tab2[0] );
                        $tab2[1] = trim( $tab2[1] );
                        $end = strlen( $tab2[1] ) - 2;
                        $tab[$tab2[0]] = substr( $tab2[1], 1, $end );
                    }
                }
            }
        }
        // Space
        else if ( ereg( "^( ).*", $text, $regs ) )
        {
            $tab[1] = "s";
            $tab[2] = $regs[1];
        }
        // Text
        else if ( ereg( "^([^< ]+).*", $text, $regs ) )
        {
            $tab[1] = "t";
            $tab[2] = trim( $regs[1] );
        }
        // Pruning
        $begin = strlen( $regs[1] );
        $end = strlen( $text );
        $text = substr( $text, $begin, $end );
        $tab[0] = $text;

        return $tab;
    }

    function MakeLine() // Makes a line
    {
        $this->Text.=" ";
        $this->LineLength = array();
        $this->TagHref = array();
        $Length = 0;
        $this->nbSpace = 0;

        $i = $this->BeginLine();
        $this->TagName = array();

        if ( $i == 0 )
        {
            $Length = $this->StringLength[0];
            $this->TagName[0] = 1;
            $this->TagHref[0] = $this->href;
        }

        while ( $Length < $this->wTextLine )
        {
            $tab = $this->Parser( $this->Text );
            $this->Text = $tab[0];
            if ( $this->Text == "" )
            {
                $this->LastLine = true;
                break;
            }

            if ( $tab[1] == "o" )
            {
                array_unshift( $this->PileStyle, $tab[2] );
                $this->FindStyle( $this->PileStyle[0], $i + 1 );

                $this->DoStyle( $i + 1 );
                $this->TagName[$i + 1] = 1;
                if ( $this->TagStyle[$tab[2]]['indent'] != -1 )
                {
                    $Length+=$this->TagStyle[$tab[2]]['indent'];
                    $this->Indent = $this->TagStyle[$tab[2]]['indent'];
                }
                if ( $tab[2] == "a" )
                    $this->href = $tab['href'];
            }

            if ( $tab[1] == "c" )
            {
                array_shift( $this->PileStyle );
                $this->FindStyle( $this->PileStyle[0], $i + 1 );
                $this->DoStyle( $i + 1 );
                $this->TagName[$i + 1] = 1;
                if ( $this->TagStyle[$tab[2]]['indent'] != -1 )
                {
                    $this->LastLine = true;
                    $this->Text = trim( $this->Text );
                    break;
                }
                if ( $tab[2] == "a" )
                    $this->href = "";
            }

            if ( $tab[1] == "s" )
            {
                $i++;
                $Length+=$this->Space;
                $this->Line2Print[$i] = "";
                if ( $this->href != "" )
                    $this->TagHref[$i] = $this->href;
            }

            if ( $tab[1] == "t" )
            {
                $i++;
                $this->StringLength[$i] = $this->GetStringWidth( $tab[2] );
                $Length+=$this->StringLength[$i];
                $this->LineLength[$i] = $Length;
                $this->Line2Print[$i] = $tab[2];
                if ( $this->href != "" )
                    $this->TagHref[$i] = $this->href;
            }
        }

        trim( $this->Text );
        if ( $Length > $this->wTextLine || $this->LastLine == true )
            $this->EndLine();
    }

    function BeginLine()
    {
        $this->Line2Print = array();
        $this->StringLength = array();

        $this->FindStyle( $this->PileStyle[0], 0 );
        $this->DoStyle( 0 );

        if ( count( $this->NextLineBegin ) > 0 )
        {
            $this->Line2Print[0] = $this->NextLineBegin['text'];
            $this->StringLength[0] = $this->NextLineBegin['length'];
            $this->NextLineBegin = array();
            $i = 0;
        }
        else
        {
            ereg( "^(( *(<([^>]+)>)* *)*)(.*)", $this->Text, $regs );
            $regs[1] = ereg_replace( " ", "", $regs[1] );
            $this->Text = $regs[1] . $regs[5];
            $i = -1;
        }

        return $i;
    }

    function EndLine()
    {
        if ( end( $this->Line2Print ) != "" && $this->LastLine == false )
        {
            $this->NextLineBegin['text'] = array_pop( $this->Line2Print );
            $this->NextLineBegin['length'] = end( $this->StringLength );
            array_pop( $this->LineLength );
        }

        while ( end( $this->Line2Print ) == "" )
            array_pop( $this->Line2Print );

        $this->Delta = $this->wTextLine - end( $this->LineLength );

        $this->nbSpace = 0;
        for ( $i = 0; $i < count( $this->Line2Print ); $i++ )
        {
            if ( $this->Line2Print[$i] === "" )
                $this->nbSpace++;
        }
    }

    function PrintLine()
    {
        $border = 0;
        if ( $this->border == 1 )
            $border = "LR";
        $this->Cell( $this->wLine, $this->hLine, "", $border, 0, 'C', $this->fill );
        $y = $this->GetY();
        $this->SetXY( $this->Xini + $this->lPadding, $y );

        if ( $this->Indent != -1 )
        {
            if ( $this->Indent != 0 )
                $this->Cell( $this->Indent, $this->hLine, "", 0, 0, 'C', 0 );
            $this->Indent = -1;
        }

        $space = $this->LineAlign();
        $this->DoStyle( 0 );
        for ( $i = 0; $i < count( $this->Line2Print ); $i++ )
        {
            if ( $this->TagName[$i] == 1 )
                $this->DoStyle( $i );
            if ( $this->Line2Print[$i] == "" )
                $this->Cell( $space, $this->hLine, "         ", 0, 0, 'C', 0, $this->TagHref[$i] );
            else
                $this->Cell( $this->StringLength[$i], $this->hLine, $this->Line2Print[$i], 0, 0, 'C', 0, $this->TagHref[$i] );
        }

        $this->LineBreak();
        if ( $this->LastLine && $this->Text != "" )
            $this->EndParagraph();
        $this->LastLine = false;
    }

    function LineAlign()
    {
        $space = $this->Space;
        if ( $this->align == "J" )
        {
            if ( $this->nbSpace != 0 )
                $space = $this->Space + ($this->Delta / $this->nbSpace);
            if ( $this->LastLine )
                $space = $this->Space;
        }

        if ( $this->align == "R" )
            $this->Cell( $this->Delta, $this->hLine, "", 0, 0, 'C', 0 );

        if ( $this->align == "C" )
            $this->Cell( $this->Delta / 2, $this->hLine, "", 0, 0, 'C', 0 );

        return $space;
    }

    function LineBreak()
    {
        $x = $this->Xini;
        $y = $this->GetY() + $this->hLine;
        $this->SetXY( $x, $y );
    }

    function EndParagraph() // Interline between paragraphs
    {
        $border = 0;
        if ( $this->border == 1 )
            $border = "LR";
        $this->Cell( $this->wLine, $this->hLine / 2, "", $border, 0, 'C', $this->fill );
        $x = $this->Xini;
        $y = $this->GetY() + $this->hLine / 2;
        $this->SetXY( $x, $y );
    }

    function WriteHTML( $html, $entreLinha = 1 )
    {
        //HTML parser
        $html = str_replace( "\n", ' ', $html );
        $a = preg_split( '/<(.*)>/U', $html, -1, PREG_SPLIT_DELIM_CAPTURE );

        foreach ( $a as $i => $e )
        {
            if ( $i % 2 == 0 )
            {
                //Text
                if ( $this->HREF )
                    $this->PutLink( $this->HREF, $e );
                else
                    $this->Write( $entreLinha, $e );
            }
            else
            {
                //Tag
                if ( $e{0} == '/' )
                    $this->CloseTag( strtoupper( substr( $e, 1 ) ) );
                else
                {
                    //Extract attributes
                    $a2 = explode( ' ', $e );
                    $tag = strtoupper( array_shift( $a2 ) );
                    $attr = array();
                    foreach ( $a2 as $v )
                        if ( ereg( '^([^=]*)=["\']?([^"\']*)["\']?$', $v, $a3 ) )
                            $attr[strtoupper( $a3[1] )] = $a3[2];
                    $this->OpenTag( $tag, $attr );
                }
            }
        }
    }

    function OpenTag( $tag, $attr )
    {
        //Opening tag
        if ( $tag == 'B' or $tag == 'I' or $tag == 'U' )
            $this->SetStyle( $tag, true );
        if ( $tag == 'A' )
            $this->HREF = $attr['HREF'];
        if ( $tag == 'BR' )
            $this->Ln( 5 );
    }

    function CloseTag( $tag )
    {
        //Closing tag
        if ( $tag == 'B' or $tag == 'I' or $tag == 'U' )
            $this->SetStyle( $tag, false );
        if ( $tag == 'A' )
            $this->HREF = '';
    }

    function SetStyle( $tag, $enable )
    {
        //Modify style and select corresponding font
        $this->$tag+=($enable ? 1 : -1);
        $style = '';
        foreach ( array('B', 'I', 'U') as $s )
            if ( $this->$s > 0 )
                $style.=$s;
        $this->SetFont( '', $style );
    }

    function PutLink( $URL, $txt )
    {
        //Put a hyperlink
        $this->SetTextColor( 0, 0, 255 );
        $this->SetStyle( 'U', true );
        $this->Write( 5, $txt, $URL );
        $this->SetStyle( 'U', false );
        $this->SetTextColor( 0 );
    }

    public function GetLeftMargin()
    {
        return $this->lMargin;
    }

    public function GetRightMagin()
    {
        return $this->rMargin;
    }

    public function GetPageWidth()
    {
        return $this->w;
    }

    public function GetPageHeight()
    {
        return $this->h;
    }

}

?>