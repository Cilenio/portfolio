import java.awt.GridLayout;
import java.awt.Container;
import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JTextField;

public class ExemploGridLayout {

	public static void main(String[] args) {
		JFrame janelaPrincipal =new JFrame("Interfaces");
		janelaPrincipal.setSize(400,159);
		janelaPrincipal.setLocationRelativeTo(null);
		
		Container container = janelaPrincipal.getContentPane();
		
		container.setLayout(new GridLayout(3,2));
		
		container.add(new JLabel("Nome"));
		container.add(new JTextField());
		container.add(new JLabel("apelido"));
		container.add(new JTextField());
		container.add(new JLabel("idade"));
		container.add(new JTextField());
		
		janelaPrincipal.setVisible(true);
		
	}

}
