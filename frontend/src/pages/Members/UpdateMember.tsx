import PageBreadcrumb from "@/components/common/PageBreadCrumb";
import PersonalInformation from "@/components/Members/AddMember/PersonalInformation";
import Button from "@/components/ui/button/Button";
import { useUpdateMember } from "@/hooks/members/useUpdateMember";
import { useGetMemberData } from "@/hooks/members/useGetMemberData";
import { useMemberActions } from "@/stores/memberStore";
import { useEffect } from "react";
import { useParams } from "react-router";

export default function UpdateMember() {
  const { member_id } = useParams();
  const updateMember = useUpdateMember(member_id!);
  const { loading, data } = useGetMemberData(member_id!);
  const { populateMemberData } = useMemberActions();

  useEffect(() => {
    if (data) {
      populateMemberData(data);
    }
  }, [data, populateMemberData]);

  if (loading) {
    return <div>Loading...</div>;
  }

  return (
    <div>
      <PageBreadcrumb
        pageTitle="Update Member"
        parentPage={{ name: "Members", link: "/members" }}
      />

      <div className="grid grid-cols-1 gap-6 xl:grid-cols-1">
        <div className="space-y-6">
          <PersonalInformation />
          <Button
            variant="primary"
            className="w-full"
            onClick={() => updateMember()}
          >
            Update Information
          </Button>
        </div>
      </div>
    </div>
  );
}
