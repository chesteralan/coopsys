import ComponentCard from "@/components/common/ComponentCard";
import Label from "@/components/form/Label";
import Input from "@/components/form/input/InputField";
import DatePicker from "@/components/form/date-picker";
import GenderInput from "@/components/form/custom/GenderInput";
import CivilStatus from "@/components/form/custom/CivilStatus";

export default function PersonalInformation() {
  return (
    <ComponentCard title="Personal Information">
      <div className="space-y-6">
        <div>
          <Label htmlFor="firstName">First Name</Label>
          <Input type="text" id="firstName" placeholder="First Name" />
        </div>
        <div>
          <Label htmlFor="lastName">Last Name</Label>
          <Input type="text" id="lastName" placeholder="Last Name" />
        </div>
        <div>
          <Label htmlFor="middleName">Middle Name</Label>
          <Input type="text" id="middleName" placeholder="Middle Name" />
        </div>
        <div className="flex flex-col gap-6 md:flex-row">
          <div className="basis-1/2">
            <DatePicker
              id="date-picker"
              label="Date of Birth"
              placeholder="Select a date"
              onChange={(dates, currentDateString) => {
                // Handle your logic
                console.log({ dates, currentDateString });
              }}
            />
          </div>
          <div className="basis-1/2">
            <Label htmlFor="placeOfBirth">Place of Birth</Label>
            <Input type="text" id="placeOfBirth" placeholder="Place of Birth" />
          </div>
        </div>
        <div className="flex flex-col gap-6 md:flex-row">
          <GenderInput className="basis-1/2" />
          <div className="basis-1/2">
            <Label htmlFor="religion">Religion</Label>
            <Input type="text" id="religion" placeholder="Religion" />
          </div>
        </div>
        <CivilStatus />
      </div>
    </ComponentCard>
  );
}
