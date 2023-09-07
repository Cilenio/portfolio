import java.awt.GridLayout;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JMenu;
import javax.swing.JMenuBar;
import javax.swing.JMenuItem;
import javax.swing.JPanel;

public class ExemploMenu {

	public static void main(String[] args) {
		JFrame janelaPrincipal =new JFrame("Interfaces");
		janelaPrincipal.setSize(400,200);
		janelaPrincipal.setLocationRelativeTo(null);
		
		JMenuBar menuBar = new JMenuBar();
		JMenu menufile = new JMenu("File");
		menufile.add(new JMenuItem("Novo"));
		menufile.add(new JMenuItem("abrir"));
		menufile.addSeparator();
		menufile.add(new JMenuItem("Sair"));
		
		JMenu menuHelp = new JMenu("Ajuda");
		menuHelp.add(new JMenuItem("Topico"));
		menuHelp.add(new JMenuItem("Sobre o sistema"));
		
		menuBar.add(menufile);
		menuBar.add(menuHelp);
		
		janelaPrincipal.setJMenuBar(menuBar);
		janelaPrincipal.setVisible(true);

	}

}
