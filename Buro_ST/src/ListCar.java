public class ListCar {

    private String location;

    public ListCar(String location, String make, String model, String avaStart, String avaEnd, int price) {
        this.location = location;
        this.make = make;
        this.model = model;
        this.avaStart = avaStart;
        this.avaEnd = avaEnd;
        this.price = price;
    }

    public String getLocation() {
        return location;
    }

    public void setLocation(String location) {
        this.location = location;
    }

    public String getMake() {
        return make;
    }

    public void setMake(String make) {
        this.make = make;
    }

    public String getModel() {
        return model;
    }

    public void setModel(String model) {
        this.model = model;
    }

    public String getAvaStart() {
        return avaStart;
    }

    public void setAvaStart(String avaStart) {
        this.avaStart = avaStart;
    }

    public String getAvaEnd() {
        return avaEnd;
    }

    public void setAvaEnd(String avaEnd) {
        this.avaEnd = avaEnd;
    }

    public int getPrice() {
        return price;
    }

    public void setPrice(int price) {
        this.price = price;
    }

    private String make;
    private String model;
    private String avaStart;
    private String avaEnd;
    private int price;



}
