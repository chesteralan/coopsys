import PageBreadcrumb from "@/components/common/PageBreadCrumb";
import ContactInformation from "@/components/Members/AddMember/ContactInformation";
import EducationalAttainment from "@/components/Members/AddMember/EducationalAttainment";
import Occupation from "@/components/Members/AddMember/Occupation";
import PersonalInformation from "@/components/Members/AddMember/PersonalInformation";

export default function AddMember() {
  return (
    <div>
      <PageBreadcrumb pageTitle="Add Member" parentPage={{ name: "Members", link: "/members" }} />
      <div className="grid grid-cols-1 gap-6 xl:grid-cols-2">
        <div className="space-y-6">
          <PersonalInformation />
          <EducationalAttainment />
        </div>
        <div className="space-y-6">
          <ContactInformation />
          <Occupation />
        </div>
      </div>
    </div>
  );
}
