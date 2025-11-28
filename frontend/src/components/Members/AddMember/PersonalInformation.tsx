import ComponentCard from "@/components/common/ComponentCard";
import Label from "@/components/form/Label";
import Input from "@/components/form/input/InputField";
import DatePicker from "@/components/form/date-picker";
import GenderInput from "@/components/form/custom/GenderInput";
import CivilStatus from "@/components/form/custom/CivilStatus";
import {
  useMemberActions,
  useMemberDateOfBirth,
  useMemberFirstName,
  useMemberLastName,
  useMemberMiddleName,
  useMemberPlaceOfBirth,
  useMemberReligion,
} from "@/stores/memberStore";

export default function PersonalInformation() {
  const firstName = useMemberFirstName();
  const lastName = useMemberLastName();
  const middleName = useMemberMiddleName();
  const dateOfBirth = useMemberDateOfBirth();
  const placeOfBirth = useMemberPlaceOfBirth();
  const religion = useMemberReligion();
  const {
    setFirstName,
    setLastName,
    setMiddleName,
    setDateOfBirth,
    setPlaceOfBirth,
    setReligion,
  } = useMemberActions();

  return (
    <ComponentCard title="Personal Information">
      <div className="space-y-6">
        <div className="grid grid-cols-3 gap-6">
          <div>
            <Label htmlFor="firstName">First Name</Label>
            <Input
              type="text"
              id="firstName"
              placeholder="First Name"
              value={firstName}
              onChange={(e) => setFirstName(e.target.value)}
            />
          </div>
          <div>
            <Label htmlFor="middleName">Middle Name</Label>
            <Input
              type="text"
              id="middleName"
              placeholder="Middle Name"
              value={middleName}
              onChange={(e) => setMiddleName(e.target.value)}
            />
          </div>
          <div>
            <Label htmlFor="lastName">Last Name</Label>
            <Input
              type="text"
              id="lastName"
              placeholder="Last Name"
              value={lastName}
              onChange={(e) => setLastName(e.target.value)}
            />
          </div>
        </div>
        <div className="grid grid-cols-3 gap-6">
          <div>
            <DatePicker
              id="date-picker"
              label="Date of Birth"
              placeholder="Select a date"
              onChange={(_, currentDateString) => {
                setDateOfBirth(currentDateString);
              }}
              defaultDate={dateOfBirth}
            />
          </div>
          <div>
            <Label htmlFor="placeOfBirth">Place of Birth</Label>
            <Input
              type="text"
              id="placeOfBirth"
              placeholder="Place of Birth"
              value={placeOfBirth}
              onChange={(e) => setPlaceOfBirth(e.target.value)}
            />
          </div>
          <div>
            <Label htmlFor="religion">Religion</Label>
            <Input
              type="text"
              id="religion"
              placeholder="Religion"
              value={religion}
              onChange={(e) => setReligion(e.target.value)}
            />
          </div>
        </div>
        <div className="flex flex-col gap-6 md:flex-row">
          <GenderInput className="basis-1/3" />
          <CivilStatus className="basis-2/3" />
        </div>
      </div>
    </ComponentCard>
  );
}
