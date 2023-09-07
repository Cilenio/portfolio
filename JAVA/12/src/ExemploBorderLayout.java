import java.awt.Container;
import java.awt.BorderLayout;
import javax.swing.JButton;
import javax.swing.JFrame;

public class ExemploBorderLayout {

	public static void main(String[] args) {
		JFrame janelaPrincipal =new JFrame("Interfaces");
		janelaPrincipal.setSize(400,400);
		janelaPrincipal.setLocationRelativeTo(null);
		
		Container container = janelaPrincipal.getContentPane();
		
		container.setLayout(new BorderLayout());
		container.add(new JButton("Botao Top"), BorderLayout.NORTH);
		container.add(new JButton("Botao left"), BorderLayout.WEST);
		container.add(new JButton("Botao rigth"), BorderLayout.EAST);
		container.add(new JButton("Botao botton"), BorderLayout.SOUTH);
		container.add(new JButton("Botao center"), BorderLayout.CENTER);
		
		janelaPrincipal.setVisible(true);
		
	}

}
