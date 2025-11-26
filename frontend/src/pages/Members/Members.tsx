import PageBreadcrumb from "@/components/common/PageBreadCrumb";
import ComponentCard from "@/components/common/ComponentCard";
import BasicTableOne from "@/components/tables/BasicTables/BasicTableOne";

type MembersProps = {
  status?: "all" | "active" | "inactive";
};

export default function Members({ status = "all" }: MembersProps) {

  const statusTitle = status.charAt(0).toUpperCase() + status.slice(1) + " Members";
  
  return (
    <>
      <PageBreadcrumb pageTitle={statusTitle} 
      parentPage={{ name: "Members", link: "/members" }}
      />
      <div className="space-y-6">
        <ComponentCard title={statusTitle}>
          <BasicTableOne />
        </ComponentCard>
      </div>
    </>
  );
}
