import org.junit.Test;
import src.ListCar;

import static org.junit.Assert.*;

public class ListCarTest {
    @Test
    public void getLocation() throws Exception {
        ListCar Buro = new ListCar("California", "Ferrari", "California", "11/02/2019", "15/03/2019", 300);
        assertEquals("California", Buro.getLocation());
    }


    // Estimated price with a insurance fee.
    // Purpose - to find out if total price is different from the initial price.

    @Test
    public void totalPrice() throws Exception {
        ListCar Trine = new ListCar("Copenhagen", "Audi", "A3", "11/02/2019", "15/03/2019", 200);
        int totalP = Trine.getPrice() + 50;
        assertNotEquals(200, totalP);

    }
}