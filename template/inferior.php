<?php // PARTE INFERIOR DA PAGINA DEVENDO SER UTILIZADA EM CONJUNTO COM A PARTE SUPERIOR ?>
		</div><!-- content -->
	</div><!-- conatiner-->
</body>
</html>

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript">
var cod = <?=json_encode($_GET['cod'])?>;
function formatoValor(id){
	var valor =	$('#'+id).val();
    // remove simbolos e letras do valor
	valor  = valor.replace(/[^0-9]/g, '');
	// Verifica se o valor não esta vazio
	if (valor.length > 0) {
		// convert em inteiro para remover 0 a esquerda
		valor  = parseInt( valor.replace(/[\D]+/g,''));
		// converte novamente para string 
		valor = valor+'';
		// retorna o tamanho da string
	   var tamanho = valor.length;

		switch(tamanho){
			case 1:
				valor = '0,0'+ valor.substr(0);
				break;
			case 2:
				valor = '0,'+valor.substr(0,2);
				break;
			case 3:
				valor = valor.replace(/(\d{1})(\d{2})/, '$1,$2');
				break;
			case 4:
				valor = valor.replace(/(\d{2})(\d{2})/, '$1,$2');
				break;
			case 5:
				valor = valor.replace(/(\d{3})(\d{2})/, '$1,$2');
				break;
			case 6:
				valor = valor.replace(/(\d{1})(\d{3})(\d{2})/, '$1.$2,$3');
				break;
			case 7:
				valor = valor.replace(/(\d{2})(\d{3})(\d{2})/, '$1.$2,$3');
				break;
			case 8:
				valor = valor.replace(/(\d{3})(\d{3})(\d{2})/, '$1.$2,$3');
				break;
			case 9:
				valor = valor.replace(/(\d{1})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3,$4');
				break;
			case 10:
				valor = valor.replace(/(\d{2})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3,$4');
				break;
			case 11:
				valor = valor.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3,$4');
				break;
		}
	}
	$('#'+id).val(valor);
}

function update(meta){
	var categoria 		= $('#categoria'+meta).val();
	var recurso 		= $('#recurso'+meta).val();
	var prazo 			= $('#prazo'+meta).val();
	var prioridade 		= $('#prioridade'+meta).val();
	var valor 			= $('#valor'+meta).val();
	var quantidade 		= $('#quantidade'+meta).val();
	var descricao 		= $('#descricao'+meta).val();
	var observacao 		= $('#observacao'+meta).val();

	$.ajax({
		type: 'POST',
		url:  '../update.php',
		async: true, 
		data:{ 
			'categoria': categoria,
			'recurso': recurso,
			'prazo': prazo,
			'prioridade': prioridade,
			'valor': valor,
			'quantidade': quantidade,
			'descricao': descricao,
			'observacao': observacao,
			'meta': meta,
			'cod': cod,
		},
		success: function(response) {
			response = JSON.parse(response);
			$('#Lcategoria'+meta).text(response[0]);
			$('#Lprioridade'+meta).text(response[1]);
			$('#Lvalor'+meta).text(valor);
			$('#orcamentario').val(response[2]);
			$('#norcamentario').val(response[3]);
			$('#total').val(response[4]);
			$('#sucesso').css('display', 'block');
			setTimeout(function(){ $('#sucesso').css('display', 'none'); },4000);
		},
		error: function(qXHR, textStatus, errorThrown){
			$('#error').css('display', 'block');
			setTimeout(function(){ $('#error').css('display', 'none'); },4000);
		}
	});
}

$( document ).ready(function() {
	$("#observacao").dblclick(function(){ $(this).removeAttr("readonly"); });
});
</script>
