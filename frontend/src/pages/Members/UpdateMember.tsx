import PageBreadcrumb from "@/components/common/PageBreadCrumb";
import PersonalInformation from "@/components/Members/AddMember/PersonalInformation";
import Button from "@/components/ui/button/Button";
import { useAddMember } from "@/hooks/members/useAddMember";

export default function UpdateMember() {

  const addMember = useAddMember();
  
  return (
    <div>
      <PageBreadcrumb pageTitle="Update Member" parentPage={{ name: "Members", link: "/members" }} />
      
      <div className="grid grid-cols-1 gap-6 xl:grid-cols-1">
        <div className="space-y-6">
          <PersonalInformation />
          <Button variant="primary" className="w-full" onClick={() => addMember()}>
          Update Information
        </Button>
        </div>
       
      </div>
      
    </div>
  );
}
