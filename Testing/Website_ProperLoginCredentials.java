import org.openqa.selenium.By;
import org.openqa.selenium.chrome.ChromeDriver;

public class Website_ProperLoginCredentials {

	public static void main(String[] args) {
		
		System.setProperty("webdriver.chrome.driver", "C:\\Users\\aadap\\eclipse\\chromedriver.exe");
		
		
		ChromeDriver driver = new ChromeDriver();
		driver.get("https://web.ics.purdue.edu/~g1120478/");
		
		driver.findElement(By.id("username")).sendKeys("test1");
		driver.findElement(By.id("password")).sendKeys("12345");
		driver.findElement(By.xpath("//*[@id=\"submit\"]")).click();
		String u = driver.getCurrentUrl();
		if (u.equals("https://web.ics.purdue.edu/~g1120478/Home_1.php")) {
			System.out.println("Test Case Passed");
		}
		else {
			System.out.println("Test Case Failed");
		}
		driver.close();
	}

}
