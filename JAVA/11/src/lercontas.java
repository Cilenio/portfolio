import java.io.FileInputStream;
import java.io.IOException;
import java.io.ObjectInputStream;

public class lercontas {

	public static void main(String[] args) throws IOException, ClassNotFoundException {
		FileInputStream file =new FileInputStream("lista.txt");
		ObjectInputStream objs = new ObjectInputStream(file);
		
		Conta primeira = (Conta)objs.readObject();
		
		System.out.println(primeira);
		file.close();
		objs.close();

	}
	

}
