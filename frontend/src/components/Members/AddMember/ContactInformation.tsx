import ComponentCard from "@/components/common/ComponentCard";
import Label from "@/components/form/Label";
import Input from "@/components/form/input/InputField";

export default function ContactInformation() {
  return (
    <ComponentCard title="Contact Information">
      <div className="space-y-6">
        <div>
          <Label htmlFor="email">Email Address</Label>
          <Input
            type="email"
            id="email"
            placeholder="your-email-address@gmail.com"
          />
        </div>
        <div>
          <Label htmlFor="phoneNumber">Phone Number</Label>
          <Input type="text" id="phoneNumber" placeholder="+639123456789" />
        </div>
        <div>
          <Label htmlFor="address">Address</Label>
          <Input
            type="text"
            id="address"
            placeholder="123 Main St, City, State, ZIP"
          />
        </div>
      </div>
    </ComponentCard>
  );
}
