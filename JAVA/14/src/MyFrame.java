import java.awt.Color;
import javax.swing.JFrame;

public class MyFrame extends JFrame{
	MyFrame(){
		
		this.setTitle("GUI");
		this.setSize(400,400);
		this.setLocationRelativeTo(null);
		this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		this.setVisible(true);
		this.getContentPane().setBackground(new Color(6,67,89));
	}

}
