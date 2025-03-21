<?php
session_start();
if (isset($_SESSION['login'])) {
    $mensagem = 'Sobre';
} else if (!isset($_SESSION['login'])) {
    header('location:index.php');
} else {
    $mensagem = 'Essa p&aacute;gina &eacute; de acesso restrito! </br> <a href="index.php">VOLTAR</a></br>';
}
?>

<html>

<head>
</head>

<body>
    <center>
        <h2>
            <?php
            echo $mensagem;
            ?>
        </h2>
        <table width="100%" height="100%">
            <tr>
                <td align="center">
                    <table border="1px" width="800px" height="100%">
                        <tr>
                            <td colspan="2" width="800px" height="15%">
                                <img src="image/banner_imagine.jpg" alt="imagine_dragons_banner" width="800px" height="162px">
                            </td>
                        </tr>
                        <tr>
                            <td width="20%" valign="top" align="center">
                                <nav>
                                    <ul>
                                        <li><a href="sobre.php">Página Sobre</a></li>
                                        <li><a href="fotos.php">Página Fotos</a></li>
                                        <li><a href="musicas.php">Página Músicas</a></li>
                                        <li><a href="logout.php">Sair do Sistema</a></li>
                                    </ul>
                                </nav>
                            </td>
                            <td align="center" width="20%">
                                <h1>Imagine Dragons: A Revolução do Rock Alternativo</h1>

                                Formada em 2008, a banda americana Imagine Dragons conquistou o mundo com seu estilo único que mistura rock alternativo, pop e elementos eletrônicos. Liderada pelo carismático vocalista Dan Reynolds, o grupo rapidamente alcançou sucesso global com hits icônicos como "Radioactive" e "Demons". <br>

                                O álbum de estreia, Night Visions (2012), marcou o início de uma nova era para o rock alternativo. "Radioactive" se tornou um hino da década e alcançou o topo das paradas em diversos países, consolidando o Imagine Dragons como uma das bandas mais influentes da música contemporânea. <br>

                                Ao longo dos anos, a banda continuou a inovar, lançando sucessos como "Believer", "Thunder" e "Whatever It Takes", sempre com letras introspectivas e poderosas, que falam sobre superação, identidade e esperança. Seus shows são conhecidos pela energia vibrante e performances inesquecíveis, que conectam o público através da intensidade emocional e musical. <br>

                                Além de seu impacto musical, o Imagine Dragons também é conhecido por seu ativismo social. Dan Reynolds tem sido uma voz ativa em prol dos direitos LGBTQIA+, especialmente com o projeto LoveLoud, que busca apoiar a aceitação e inclusão da comunidade. A banda também está envolvida em várias causas beneficentes, tornando-os não apenas uma força no cenário musical, mas também uma inspiração fora dele. <br>

                                Com uma base de fãs leal e milhões de álbuns vendidos, Imagine Dragons continua a quebrar barreiras e evoluir. Seja através de suas letras tocantes, produções inovadoras ou seu compromisso com a mudança social, eles seguem como uma das bandas mais influentes e amadas da atualidade. <br>
                            </td>
                        </tr>
                        <tr width="100%" height="10%">
                            <td colspan="2" style="text-align: center;">
                                <q>Melhor banda existente de indie rock</q>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </center>
</body>

</html>