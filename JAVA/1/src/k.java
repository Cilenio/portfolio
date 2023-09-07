import java.io.IOException;
import java.util.Scanner;


public class k {

	public static void main(String[] args)throws IOException {
		Scanner k= new Scanner(System.in);
		MetodosEstudante metodos = new MetodosEstudante();
		
		int opc;
		do{
			System.out.println("[1] para cadastrar");
			System.out.println("[2] para listar estudante");
			System.out.println("[3] para actualizar");
			System.out.println("[4] para remover");
			opc =k.nextInt();
			
			switch (opc){
			case 1: metodos.CadastrarEstudante();break;
			case 2:metodos.listaDeEstudantes();break;
		///	case 2: metodos.listarEstudante();break;
			//case 3: metodos.actualizarEstudantes(); break;
			//case 4: metodos.removerestudante();break;
			default : System.out.println("ooo");			
			}
			
		}while(opc!=0);

		}
	}
