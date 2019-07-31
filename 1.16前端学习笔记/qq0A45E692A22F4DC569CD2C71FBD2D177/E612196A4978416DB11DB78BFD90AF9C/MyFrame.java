package my;

import java.awt.Container;
import java.awt.FlowLayout;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;


public class MyFrame extends JFrame
{
	public MyFrame(String title)
	{
		super(title);
		
		// 内容面板 (ContentPane)
		Container contentPane = getContentPane();
		
		// 什么叫 FlowLayout? 别管，这一行先照抄，直到第5章
		contentPane.setLayout(new FlowLayout());
		
		// 向内容面板里添加控件 , 如 JLabel, JButton
		contentPane.add(new JLabel("Hello,World"));
		contentPane.add(new JButton("测试"));
	}
}
